<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/tasks/bugs', [TaskController::class, 'bugs']);
Route::get('/tasks/features', [TaskController::class, 'features']);
Route::apiResource('tasks', TaskController::class);


