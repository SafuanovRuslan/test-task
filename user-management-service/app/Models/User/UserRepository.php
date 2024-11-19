<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    public function new(): User
    {
        return new User();
    }

    public function getById(int $id): null|User
    {
        /** @var null|User $result */
        $result = User::query()->where('id', '=', $id)->first();
        return $result;
    }

    public function getAll(): Collection
    {
        return User::query()->get();
    }

    public function store(User $user): bool
    {
        $timestamp = date('Y-m-d H:i:s');
        $user->created_at = $user->updated_at = $timestamp;

        return $user->save();
    }

    public function update(User $user): bool
    {
        $timestamp = date('Y-m-d H:i:s');
        $user->updated_at = $timestamp;

        return $user->save();
    }

    public function delete(int $userId): bool
    {
        return (bool)User::query()->where('id', '=', $userId)->delete();
    }
}
