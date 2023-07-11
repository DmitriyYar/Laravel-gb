<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
    public function store(Store $request): RedirectResponse
    {

        $validated = $request->validated();

        $categories = Category::create($validated);

        if ($categories) {
                return \redirect()->route('admin.categories.index')->with('success', __('Categories has been create'));
        }

        return \back()->with('error', __('Categories has not been create'));
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
    public function update(Update $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());
        if ($category->save()) {
            return \redirect()->route('admin.categories.index')->with('success', __('Categories has been update'));
        }

        return \back()->with('error', __('Categories has not been update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        try{
            $category->delete();

            return response()->json('ok', 200);
        }catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());
            return  response()->json('error', 400);
        }
    }
}
