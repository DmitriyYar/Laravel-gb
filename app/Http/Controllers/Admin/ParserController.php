<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\View\View;

//use Orchestra\Parser\Xml\Facade as Parser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser, $site): View
    {
//        $url = "https://news.rambler.ru/rss/tech/";
//        $parser->setLink($url)->saveParserData();
//        return "Data saved";

        $data = $parser->setLink($site)->saveParserData($site);

        return \view('admin.parser.index', ['data'=> $data]);

    }
}
