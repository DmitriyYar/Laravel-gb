<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
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
        // Коллекция всех новостей
        $news = $this->newsQueryBuilder->getAll();

        return view('admin.news.index', ['newsList' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('admin.news.create', [
            'categories' => $this->categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request): RedirectResponse
    {
        $validated = $request->validated();

        $news = News::create($validated); // create($news);
        if ($news) {
            $news->categories()->attach($request->getCategories());  //attach($validated['categories']);
            return \redirect()->route('admin.news.index')->with('success', __('News has been create'));
        }

        return \back()->with('error', __('News has not been create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news): View
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $this->categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, News $news): RedirectResponse
    {
        $news = $news->fill($request->validated());
        if ($news->save()) {
            $news->categories()->sync($request->getCategories());

            return \redirect()->route('admin.news.index')->with('success', __('News has been updated'));
        }

        return \back()->with('error', __('News has not been updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();

            return response()->json('ok', 200);
        }catch (\Throwable $exception) {
            \Log::error($exception->getMessage(), $exception->getTrace());
            return  response()->json('error', 400);
        }
    }
}
