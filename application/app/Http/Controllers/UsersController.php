<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $validated = $request->validated();

        $perPage = $validated['perPage'] ?? 10;
        $page = $validated['page'] ?? 1;

        $users = Users::query()->paginate(
            perPage: $perPage,
            page: $page
        );

        return UsersResource::collection($users);
    }

    /**
     * Создание нового пользователя.
     */
    public function store(StoreRequest $request)
    {
        try {
            // Получение валидированных данных
            $validated = $request->validated();

            // Шифрование пароля
            $validated['password'] = Hash::make($validated['password']);

            // Создание пользователя
            $user = Users::create($validated);

            // Возврат успешного ответа
            return response()->json($user, 201);
        } catch (\Exception $e) {
            // Обработка ошибок и возврат ответа с кодом 500
            return response()->json([
                'error' => 'Ошибка при создании пользователя',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $user)
    {
        // Возвращает данные конкретного пользователя
        return response()->json($user);
    }

    /**
     * Обновление данных пользователя.
     */
    public function update(UpdateRequest $request, Users $user)
    {
        try {
            // Получение валидированных данных
            $validated = $request->validated();

            // Шифрование пароля, если он передан
            if (isset($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            }

            // Обновление данных пользователя
            $user->update($validated);

            // Возврат успешного ответа
            return response()->json($user);
        } catch (\Exception $e) {
            // Обработка ошибок и возврат ответа с кодом 500
            return response()->json([
                'error' => 'Ошибка при обновлении пользователя',
                'details' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $user)
    {
        // Удаление пользователя, под вопросом
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 204);
    }
}