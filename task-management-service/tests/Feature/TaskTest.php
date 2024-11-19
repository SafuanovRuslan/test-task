<?php

namespace Tests\Feature;

use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function test_task_list(): void
    {
        $response = $this->get('/api/tasks');
        $response->assertStatus(200);
    }

    public function test_task_store_and_show(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->post('/api/tasks', [
            "user_id" => "1",
            "title" => "test",
            "category_id" => "2",
        ]);
        $response->assertStatus(201);

        $response = $this->get('/api/tasks/1');
        $response->assertStatus(200);
    }

    public function test_task_store_fail(): void
    {
        $response = $this->post('/api/tasks', [
            "user_id" => "1",
            "category_id" => "2",
        ]);
        $response->assertStatus(422);
        $this->assertEquals(["The title field is required."], json_decode($response->getContent(), true)['title']);
    }

    public function test_task_update(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->post('/api/tasks', [
            "user_id" => "1",
            "title" => "test",
            "category_id" => "2",
        ]);
        $response->assertStatus(201);

        $id = json_decode($response->content(), true)['id'];
        $response = $this->put("/api/tasks/$id", [
            "description" => "lorem ipsum",
        ]);
        $response->assertStatus(201);
    }

    public function test_task_update_fail(): void
    {
        $response = $this->put("/api/tasks/999", [
            "description" => "lorem ipsum",
        ]);
        $response->assertStatus(404);
    }

    public function test_task_delete(): void
    {
        $this->seed(CategorySeeder::class);

        $response = $this->post('/api/tasks', [
            "user_id" => "1",
            "title" => "test",
            "category_id" => "2",
        ]);
        $response->assertStatus(201);

        $id = json_decode($response->content(), true)['id'];
        $response = $this->delete("/api/tasks/$id");
        $response->assertStatus(200);
    }

    public function test_user_delete_fail(): void
    {
        $response = $this->delete("/api/tasks/999");
        $response->assertStatus(404);
    }
}
