<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // list all news
    public function index()
    {
        $model = app(News::class);

        $news = $model->getNews();

        return view('news.index', ['newsList' => $news]);
    }

    // return current news
    public function show(int $id)
    {
        $model = app(News::class);

        $news = $model->getNewsById($id);

        return view('news.show', ['news' => $news]);
    }
}
