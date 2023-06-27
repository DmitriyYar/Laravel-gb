<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getCategories(bool $isJoin = false): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getNewsCategoryById(int $id): Collection
    {
        return DB::table($this->table)
            ->join('category_has_news', 'category_has_news.category_id', '=', 'categories.id')
            ->join('news', 'news.id', '=', 'category_has_news.news_id')
            ->where('category_has_news.category_id', '=', $id)
            ->select('news.*', 'category_has_news.*', 'categories.title as titleCategory', 'categories.description as descCategory')
            ->get();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}
