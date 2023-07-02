<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected QueryBuilder $categoriesQueryBuilder;
    protected QueryBuilder $newsQueryBuilder;

    public function __construct(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsQueryBuilder       $newsQueryBuilder
    )
    {
        $this->categoriesQueryBuilder = $categoriesQueryBuilder;
        $this->newsQueryBuilder = $newsQueryBuilder;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index', ['categoryList' => $this->categoriesQueryBuilder->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.categories.create', [
            'categories' => $this->categoriesQueryBuilder->getModel()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $categories = $request->only(['title', 'description']);

        $categories = Category::create($categories);

        if ($categories !== false) {
                return \redirect()->route('admin.categories.index')->with('success', 'News has been create');
        }

        return \back()->with('error', 'News has not been create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        return \view('admin.categories.edit', [
            'category' => $category,
            'categories' => $this->categoriesQueryBuilder->getModel()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->only(['title', 'description']));
        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', 'Categories has been update');
        }

        return \back()->with('error', 'Categories has not been update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
