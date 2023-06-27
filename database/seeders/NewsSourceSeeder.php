<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSourceSeeder extends Seeder
{
    protected array $sources = [
        'https://tass.ru',
        'https://ria.ru',
        'https://aif.ru/',
        'https://vz.ru/',
        'https://lenta.ru',
        'https://news.mail.ru/',
        'https://www.kommersant.ru/publishing/86',
        'http://www.gazeta.ru/',
        'https://rusk.ru',
        'http://www.gazetanv.ru',
        ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news_source')->insert($this->getData());
    }

    public function getData(): array
    {
        $response = [];
        for ($i = 0; $i < 10; $i++) {
            $response[] = [
                'url' => $this->sources[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $response;
    }
}
