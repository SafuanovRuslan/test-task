<?php

namespace App\Models\User;

use Illuminate\Support\Facades\Facade;

/**
 * @method static null|array getById(int $userId)
 */
class UserServiceFacade extends Facade
{
    /**
     * @see UserService::getById()
     */
    protected static function getFacadeAccessor(): string
    {
        return UserService::class;
    }
}
