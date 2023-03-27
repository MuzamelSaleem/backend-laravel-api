<?php

class NewsMapper {
    public function map($article) {
        return [
            'title' => $article['title'],
            'description' => $article['description'],
            'url' => $article['url'],
            'image' => $article['urlToImage'],
            'source' => $article['source']['name'],
            'published_at' => Carbon::parse($article['publishedAt']),
        ];
    }
}