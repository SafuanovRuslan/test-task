<?php

namespace App\Models\Task;

use Exception;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    ) {}

    /**
     * @throws Exception
     */
    public function store(array $requestData): Task
    {
        $task = $this->taskRepository->new();
        $task->fill($requestData);

        $task->description = $task->description ?? '';

        if ($this->taskRepository->store($task)) {
            return $task;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function getById(int $userId): Task
    {
        if ($task = $this->taskRepository->getById($userId)) {
            return $task;
        }

        throw new Exception("Task not found.", 404);
    }

    public function getAll(): Collection
    {
        return $this->taskRepository->getAll();
    }

    public function getBugs(): Collection
    {
        return $this->taskRepository->getBugs();
    }

    public function getFeatures(): Collection
    {
        return $this->taskRepository->getFeatures();
    }

    /**
     * @throws Exception
     */
    public function update(int $userId, array $requestData): Task
    {
        $task = $this->taskRepository->getById($userId);
        if (!$task) {
            throw new Exception("Task not found.", 404);
        }

        $task->fill($requestData);

        if ($this->taskRepository->update($task)) {
            return $task;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function delete(int $id): bool
    {
        if ($this->taskRepository->delete($id)) {
            return true;
        }

        throw new Exception("Task not found.", 404);
    }
}
