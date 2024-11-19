<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_list(): void
    {
        $response = $this->get('/api/users');
        $response->assertStatus(200);
    }

    public function test_user_store_and_show(): void
    {
        $response = $this->post('/api/users', [
            "name" => "Имя",
            "email" => "test@email.com"
        ]);
        $response->assertStatus(201);

        $response = $this->get('/api/users/1');
        $response->assertStatus(200);
    }

    public function test_user_store_fail(): void
    {
        $response = $this->post('/api/users', [
            "name" => "Имя",
        ]);
        $response->assertStatus(422);
        $this->assertEquals(["The email field is required."], json_decode($response->getContent(), true)['email']);
    }

    public function test_user_update(): void
    {
        $response = $this->post('/api/users', [
            "name" => "Имя",
            "email" => "test@email.com"
        ]);
        $response->assertStatus(201);

        $id = json_decode($response->content(), true)['id'];
        $response = $this->put("/api/users/$id", [
            "name" => "Новое имя",
        ]);
        $response->assertStatus(201);
    }

    public function test_user_update_fail(): void
    {
        $response = $this->put("/api/users/999", [
            "name" => "Новое имя",
        ]);
        $response->assertStatus(404);
    }

    public function test_user_delete(): void
    {
        $response = $this->post('/api/users', [
            "name" => "Имя",
            "email" => "test@email.com"
        ]);
        $response->assertStatus(201);

        $id = json_decode($response->content(), true)['id'];
        $response = $this->delete("/api/users/$id");
        $response->assertStatus(200);
    }

    public function test_user_delete_fail(): void
    {
        $response = $this->delete("/api/users/999");
        $response->assertStatus(404);
    }
}
