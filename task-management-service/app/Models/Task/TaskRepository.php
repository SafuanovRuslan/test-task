<?php

namespace App\Models\Task;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository
{
    public function new(): Task
    {
        return new Task();
    }

    public function getById(int $id): null|Task
    {
        /** @var null|Task $result */
        $result = Task::query()->where('id', '=', $id)->first();
        return $result;
    }

    public function getAll(): Collection
    {
        return Task::query()->get();
    }

    public function getBugs(): Collection
    {
        // Реализуйте запросы, которые используют соединение нескольких таблиц (например, получение всех задач по категории).
        return Category::query()
            ->where('id', '=', Category::BUG)
            ->with('tasks')
            ->get();
    }

    public function getFeatures(): Collection
    {
        // Реализуйте запросы, которые используют соединение нескольких таблиц (например, получение всех задач по категории).
        return Task::query()
            ->select(['tasks.*'])
            ->leftJoin('categories', 'tasks.category_id', '=', 'categories.id')
            ->where('categories.id', '=', Category::FEATURE)
            ->get();
    }

    public function store(Task $task): bool
    {

        $task->status = Task::STATUS_NEW;

        $timestamp = date('Y-m-d H:i:s');
        $task->created_at = $task->updated_at = $timestamp;

        return $task->save();
    }

    public function update(Task $task): bool
    {
        $timestamp = date('Y-m-d H:i:s');
        $task->updated_at = $timestamp;

        return $task->save();
    }

    public function delete(int $id): bool
    {
        return (bool)Task::query()->where('id', '=', $id)->delete();
    }
}
