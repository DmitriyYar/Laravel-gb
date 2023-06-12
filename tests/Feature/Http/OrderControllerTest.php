<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    public function testSuccessOrderForm(): void
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }

    public function testSuccessStoreResponse(): void
    {
        $postData = [
            'name' => 'Ivan',
            'telephone' => '+78957894562',
            'email' => 'mail@mail.ru',
            'description' => 'description'
        ];

        $expectedData = [
            'name' => 'Ivan',
            'telephone' => '+78957894562',
            'email' => 'mail@mail.ru',
            'description' => 'description'
        ];

        $response = $this->post(route('order.store'), $postData);

        $response->assertExactJson($expectedData);
//        $response->assertJson($expectedData);
    }
}
