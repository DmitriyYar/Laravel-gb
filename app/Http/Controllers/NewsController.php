<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // list all news
    public function index()
    {
//        dd($this->getNews());
        $news = $this->getNews();

        return view('news.index', ['newsList' => $news]);
    }

    // return current news
    public function show(int $id)
    {
        $news = $this->getNews($id);

        return view('news.show', ['news' => $news]);
    }
}
