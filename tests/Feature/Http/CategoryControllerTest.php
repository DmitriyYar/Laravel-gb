<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testSuccessCategoryList(): void
    {
        $response = $this->get(route('category.show', 'sport'));

        $response->assertStatus(200);
    }

    public function testResponseContainsString(): void
    {
        $response = $this->get(route('category.show', 'sport'));

        $response->assertSee('sport');
    }
}
