<?php

namespace App\Http\Requests;

use App\Models\Task\Task;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<string>>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['int'],
            'title' => ['string', 'max:256'],
            'description' => ['string', 'max:2000'],
            'category_id' => ['int', 'exists:categories,id'],
            'status' => ['int', Rule::in([Task::STATUS_NEW, Task::STATUS_IN_WORK, Task::STATUS_CLOSED])],
        ];
    }
}
