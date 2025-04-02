<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $userId = $this->route('user')->id; // Получение ID пользователя из маршрута

        return [
            'username' => 'nullable|string|max:50',
            'email' => "nullable|email|max:255|unique:users,email,{$userId}",
            'password' => 'nullable|string|min:8',
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
            'username.string' => 'Имя пользователя должно быть строкой.',
            'username.max' => 'Имя пользователя не может быть длиннее 50 символов.',
            'email.email' => 'Email должен быть корректным адресом.',
            'email.unique' => 'Email уже используется.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
        ];
    }
}
