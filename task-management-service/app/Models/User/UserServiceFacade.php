<?php

namespace App\Models\User;

use Illuminate\Support\Facades\Facade;

/**
 * @method static null|array getById(int $userId)
 * @method static null|array updateUserCache(int $userId, string $userEmail)
 */
class UserServiceFacade extends Facade
{
    /**
     * @see UserService::getById()
     * @see UserService::updateUserCache()
     */
    protected static function getFacadeAccessor(): string
    {
        return UserService::class;
    }
}
