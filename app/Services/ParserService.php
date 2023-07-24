<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $url = "";
        if ($link === 'rambler') {
            $url = "https://news.rambler.ru/rss/tech/";
        } else if ($link === 'cbr') {
            $url = "https://www.cbr-xml-daily.ru/daily.xml";
        } else {
            abort(404);
        }

        //$this->link = $link;
        $this->link = $url;

        return $this;
    }

    public function saveParserData($site): array
    {
        $xml = Facade::load($this->link);

        $data = [];
        if ($site === 'rambler') {
            $data = $xml->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,author,pubDate]'
                ]
            ]);
        }
        if ($site === 'cbr') {
            $data = $xml->parse([
                'Date' => [
                    'uses' => '::Date'
                ],
                'name' => [
                    'uses' => '::name'
                ],
                'valute' => [
                    'uses' => 'Valute[::ID>id,CharCode,Nominal,Name,Value]'
                ]
            ]);
        }
        return $data;
    }
}
