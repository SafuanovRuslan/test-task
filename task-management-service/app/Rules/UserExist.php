<?php

namespace App\Rules;

use App\Models\User\UserServiceFacade;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Translation\PotentiallyTranslatedString;

class UserExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $userId, Closure $fail): void
    {
        $cachedUsers = Cache::get('users', []);
        if (empty($cachedUsers[$userId])) {
            $user = UserServiceFacade::getById($userId);
            if (!$user) {
                $fail('User not exist.');
            }
        }
    }
}
