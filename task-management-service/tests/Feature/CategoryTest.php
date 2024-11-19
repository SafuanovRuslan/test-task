<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function test_category_list(): void
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }
}
