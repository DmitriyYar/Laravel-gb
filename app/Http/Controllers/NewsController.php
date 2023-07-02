<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
    // list all news
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        $news = $newsQueryBuilder->getModel()->get();

        return view('news.index', ['newsList' => $news]);
    }

    // return current news
    public function show(News $news): View
    {
        return view('news.show', ['news' => $news]);
    }
}
