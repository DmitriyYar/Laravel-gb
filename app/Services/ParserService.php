<?php

declare(strict_types=1);

namespace App\Services;

use App\Jobs\NewsParsingJob;
use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Orchestra\Parser\Xml\Facade;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function saveParserData(): void
    {

        $xml = Facade::load($this->link);

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

        $category = [
            "title" => $data['title'],
            "description" => $data['description']
        ];
        $categoryExists = Category::whereIn('title', [$data['title']])->get();
        if ($categoryExists->isEmpty()) {
            Category::create($category);
        }

        foreach ($data['news'] as $news) {
            $data = [
                'title' => $news['title'],
                'author' => $news['author'],
                'status'=> 'active',
                'image' => fake()->imageUrl(),
                'description' => 'news news news',
            ];
            $news = News::create($data);
            if ($news) {
                $news->categories()->attach(Category::where('title', [$category['title']])->first()->id);
            }
        }
/*
        // Сохранение в файловую систему
        $explode = explode("/", $this->link);
        $fileName = end($explode);

        Storage::append('parse/' . $fileName . ".txt", json_encode($data));
*/
    }
}
