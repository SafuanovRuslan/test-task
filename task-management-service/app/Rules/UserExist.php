<?php

namespace App\Rules;

use App\Models\User\UserServiceFacade;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class UserExist implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = UserServiceFacade::getById($value);
        if (!$user) {
            $fail('User not exist.');
        }
    }
}
