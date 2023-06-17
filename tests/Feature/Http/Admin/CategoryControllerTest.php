<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testSuccessCategoryList(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

}
