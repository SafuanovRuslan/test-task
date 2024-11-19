<?php

namespace App\Http\Controllers;

use App\Models\Category\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->categoryService->getAll());
    }
}
