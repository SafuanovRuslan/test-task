<?php

namespace App\Models\Task;

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
