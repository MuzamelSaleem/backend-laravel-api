<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Http\Request;
use Exception;

class NewsController extends Controller
{

    private $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function getNews(Request $request)
    {
        $news = $this->newsService->getNews($request);

        return response()->json($news);
    }

}
