<?php

namespace App\DataMappers;

class NewsApiDataMapper
{
    public function map($newsData)
    {
        $mappedNews = [];

        $newsData = $newsData->articles;

        foreach ($newsData as $key => $news) {

            $mappedNews[] = [
                'id' => $key + 1,
                'title' => $news->title,
                'description' => $news->description,
                'url' => $news->url,
                'image' => $news->urlToImage,
            ];
        }

        return $mappedNews;
    }
}
