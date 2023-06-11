<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // list news categories
    public function index()
    {
        $categorys = $this->getNewsCategories();

        return view('category.index', ['listCategoryNews' => $categorys]);
    }

    public function show(string $category)
    {
        $list= $this->getNewsCategories($category);

        return view('category.show', ['listCategoryNews' =>  $list, 'title' => $category]);
    }
}
