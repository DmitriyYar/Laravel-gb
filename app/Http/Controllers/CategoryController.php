<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // list news categories
    public function index()
    {
        $categorys = $this->getNewsCategories();

        return view('news.category', ['listCategoryNews' => $categorys]);
    }

    public function show(string $category)
    {
        $list= $this->getNewsCategories($category);
//        dd($list);
        return view('news.showCategory', ['listCategoryNews' =>  $list, 'title' => $category]);
    }
}
