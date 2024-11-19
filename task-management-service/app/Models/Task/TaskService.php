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
        $user = $this->taskRepository->new();
        $user->fill($requestData);

        $user->description = $user->description ?? '';

        if ($this->taskRepository->store($user)) {
            return $user;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function getById(int $userId): Task
    {
        if ($user = $this->taskRepository->getById($userId)) {
            return $user;
        }

        throw new Exception("Task not found.", 404);
    }

    public function getAll(): Collection
    {
        return $this->taskRepository->getAll();
    }

    /**
     * @throws Exception
     */
    public function update(int $userId, array $requestData): Task
    {
        $user = $this->taskRepository->getById($userId);
        if (!$user) {
            throw new Exception("Task not found.", 404);
        }

        $user->fill($requestData);

        if ($this->taskRepository->update($user)) {
            return $user;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function delete(int $userId): bool
    {
        if ($this->taskRepository->delete($userId)) {
            return true;
        }

        throw new Exception("Task not found.", 404);
    }
}
