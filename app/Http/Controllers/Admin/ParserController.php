<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\NewsSource;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

//use Orchestra\Parser\Xml\Facade as Parser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser): string //$site
    {
        $urls = [
            "https://news.rambler.ru/rss/tech",
            "https://news.rambler.ru/rss/community",
            "https://news.rambler.ru/rss/world",
            "https://news.rambler.ru/rss/moscow_city",
            "https://news.rambler.ru/rss/politics",
            "https://news.rambler.ru/rss/incidents",
            "https://news.rambler.ru/rss/starlife",
            "https://news.rambler.ru/rss/army",
            "https://news.rambler.ru/rss/games",
            "https://news.rambler.ru/rss/articles",
            "https://news.rambler.ru/rss/Omsk",
            "https://news.rambler.ru/rss/Khanty",
            "https://news.rambler.ru/rss/Saransk",
        ];

 //        $urlsBD = [];
        $urlsBD = NewsSource::all()->map(function ($item, $key) {
            return ($item['url']);
        });

        foreach ($urlsBD  as $url) {
            dispatch(new NewsParsingJob($url)); //поставить задачу в очередь
        }
        return "Data saved";
    }
}
