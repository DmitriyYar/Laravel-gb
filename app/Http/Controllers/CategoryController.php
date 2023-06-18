<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // list news categories
    public function index()
    {
        $model = app(Category::class);

        return view('category.index', ['listCategoryNews' => $model->getCategories()]);
    }

    public function show(int $id) // передать id   string $category
    {
        $model = app(Category::class);

        $category = $model->getCategoryById($id);

        $listCategoryNews = $model->getNewsCategoryById($id); // получил категорию с id=1

        return view('category.show', ['listCategoryNews' => $listCategoryNews, 'title' => $category->title]);
    }
}
