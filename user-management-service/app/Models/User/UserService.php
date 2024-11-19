<?php

namespace App\Models\User;

use Exception;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {}

    /**
     * @throws Exception
     */
    public function store(array $requestData): User
    {
        $user = $this->userRepository->new();
        $user->fill($requestData);

        if ($this->userRepository->store($user)) {
            return $user;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function getById(int $userId): User
    {
        if ($user = $this->userRepository->getById($userId)) {
            return $user;
        }

        throw new Exception("User not found.", 404);
    }

    public function getAll(): Collection
    {
        return $this->userRepository->getAll();
    }

    /**
     * @throws Exception
     */
    public function update(int $userId, array $requestData): User
    {
        $user = $this->userRepository->getById($userId);
        if (!$user) {
            throw new Exception("User not found.", 404);
        }

        $user->fill($requestData);

        if ($this->userRepository->update($user)) {
            return $user;
        }

        throw new Exception("Unknown error. Contact the administrator.", 500);
    }

    /**
     * @throws Exception
     */
    public function delete(int $userId): bool
    {
        if ($this->userRepository->delete($userId)) {
            return true;
        }

        throw new Exception("User not found.", 404);
    }
}
