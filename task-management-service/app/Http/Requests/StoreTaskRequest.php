<?php

namespace App\Http\Requests;

use App\Rules\UserExist;

class StoreTaskRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'int', new UserExist()],
            'title' => ['required', 'string', 'max:256'],
            'description' => ['string', 'max:2000'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
        ];
    }
}
