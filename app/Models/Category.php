<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
    ];

    /* Relations */
    public function news(): BelongsToMany
    {
        // определяем связь многие ко многим
        return $this->belongsToMany(News::class, 'category_has_news', 'category_id', 'news_id');
    }

    /* Scopes's */
}
