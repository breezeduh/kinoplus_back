<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Проверка прав доступа (можно изменить на false для авторизованных пользователей)
    }

    public function rules(): array
    {
        return [
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|min:1|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'page.integer' => 'Параметр "page" должен быть целым числом',
            'page.min' => 'Параметр "page" должен быть не меньше 1',
            'perPage.integer' => 'Параметр "perPage" должен быть целым числом',
            'perPage.min' => 'Параметр "perPage" должен быть не меньше 1',
            'perPage.max' => 'Параметр "perPage" не должен превышать 100',
        ];
    }
}
