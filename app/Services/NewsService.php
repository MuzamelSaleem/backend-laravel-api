<?php

namespace App\Services;

use App\DataMappers\NewsApiDataMapper;
use App\DataMappers\NewYorkTimesApiDataMapper;
use GuzzleHttp\Client;

class NewsService
{
    private $newsApiDataMapper;
    private $newYorkTimesApiDataMapper;

    public function __construct(NewsApiDataMapper $newsApiDataMapper, NewYorkTimesApiDataMapper $newYorkTimesApiDataMapper)
    {
        $this->newsApiDataMapper = $newsApiDataMapper;
        $this->newYorkTimesApiDataMapper = $newYorkTimesApiDataMapper;
    }

    public function getNews($request)
    {
        $client = new Client();
        $source = 'bbc-news';
        $query = 'election';

        $news = [];
        
        $api = $request->get('source');
        $category = $request->get('category');

        $newsApiEndpoint = "https://newsapi.org/v2/top-headlines?sources=$source&apiKey=ee8e2e1317b14c398ce8e818daba91c5";
        $newYorkTimesApiEndpoint = "https://api.nytimes.com/svc/search/v2/articlesearch.json?q=$category&api-key=w7kxA2oS7AveAzM11ymWhkPICWLriLL4";

        $newsApiDataMapper = new NewsApiDataMapper();
        $newYorkTimesApiDataMapper = new NewYorkTimesApiDataMapper();

        if ($api === 'news-api' || $api == '') {

            $response = $client->get($newsApiEndpoint);
            $newsData = json_decode($response->getBody());
            $news[] = $newsApiDataMapper->map($newsData);

        } elseif ($api === 'new-york-times') {

            $response = $client->get($newYorkTimesApiEndpoint);
            $newsData = json_decode($response->getBody());
            $news[] = $newYorkTimesApiDataMapper->map($newsData);

        } else {
            // handle invalid API
            return response()->json(['error' => 'Invalid API'], 400);
        }

        return $news;
    }
}
