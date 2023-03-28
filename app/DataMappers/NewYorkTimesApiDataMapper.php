<?php

namespace App\DataMappers;

class NewYorkTimesApiDataMapper
{
    public function map($newsData)
    {
        $mappedNews = [];

        $newsData = $newsData->response->docs;

        foreach ($newsData as $key => $news) {
            $mappedNews[] = [
                'id' => $key + 1,
                'title' => $news->headline->main,
                'description' => $news->lead_paragraph,
                'url' => $news->web_url,
                'image' => 'https://www.nytimes.com/'.$news->multimedia[0]->url,
            ];
        }

        return $mappedNews;
    }
}
