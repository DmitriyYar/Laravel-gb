<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getNews(int $id=null): array
    {
        $news = [];
        $faker = Factory::create();

        if($id) {
            return [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'DRAFT',
                'description' => $faker->text(),
                'created_at' => now('Europe/Moscow')
            ];
        }

        for ($i = 1; $i < 10; $i++) {
            $news[$i] = [
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'DRAFT',
                'description' => $faker->text(),
                'created_at' => now('Europe/Moscow')
            ];
        }
//        sort($news);
        return $news;
    }

    public function getNewsCategories(string $category = null): array //string $category
    {
        if($category) {
            $newsCategories =  [
                'sport' => $this->getNews(),
                'culture' => $this->getNews(),
                'science' => $this->getNews(),
                'politics' => $this->getNews()
            ];
            return  $newsCategories[$category];
        }
        return  [
            'sport',
            'culture',
            'science',
            'politics'
        ];
    }
}
