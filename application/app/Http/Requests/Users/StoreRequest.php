<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Определяет, имеет ли пользователь право выполнять запрос.
     */
    public function authorize(): bool
    {
        // Проверка прав доступа (например, только авторизованные пользователи)
        return auth()->check();
    }

    /**
     * Правила валидации.
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ];
    }

    /**
     * Сообщения об ошибках валидации.
     */
    public function messages(): array
    {
        return [
            'username.required' => 'Имя пользователя обязательно.',
            'username.string' => 'Имя пользователя должно быть строкой.',
            'username.max' => 'Имя пользователя не может быть длиннее 50 символов.',
            'email.required' => 'Email обязателен.',
            'email.email' => 'Email должен быть корректным адресом.',
            'email.unique' => 'Email уже используется.',
            'password.required' => 'Пароль обязателен.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ];
    }
}
