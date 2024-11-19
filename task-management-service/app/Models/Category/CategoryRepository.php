<?php

namespace App\Models\Category;

class CategoryRepository
{
    /**
     * @return array<int, array<int, string>>
     */
    public function list(): array
    {
        return Category::query()->get()->toArray();
    }
}
