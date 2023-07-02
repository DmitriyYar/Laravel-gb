<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    // list news categories
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $categories = $categoriesQueryBuilder->getModel()->get();

        return view('category.index', ['listCategory' =>  $categories]);
    }

    public function show(Category $category): View
    {
        $listCategoryNews = $category->news->map(fn($item) => $item);

        return view('category.show', ['listCategoryNews' => $listCategoryNews, 'title' => $category->title]);
    }
}
