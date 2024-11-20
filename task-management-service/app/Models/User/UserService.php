<?php

namespace App\Models\User;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UserService
{
    /**
     * @throws Exception
     */
    public function getById(int $userId): null|array
    {
        $response = Http::get("host.docker.internal:8080/api/users/$userId");

        switch ($response->status()) {
            case 200:
                return json_decode($response->body(), true);
            case 404:
                return null;
            case 504:
                throw new Exception("User service is not responding.", 504);
            default:
                throw new Exception("Unknown error. Contact the administrator.", 500);
        }
    }

    public function updateUserCache(int $userId, string $userEmail): void
    {
        $users = Cache::get('users', []);
        $users[$userId] = $userEmail;
        Cache::set('users', $users);
    }
}
