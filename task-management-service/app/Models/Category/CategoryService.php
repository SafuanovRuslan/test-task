<?php

namespace App\Models\Category;

class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    ) {}

    /**
     * @return array<int, array<int, string>>
     */
    public function getAll(): array
    {
        return $this->categoryRepository->list();
    }
}
