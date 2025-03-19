<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Получение всех пользователей
        $users = Users::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Возвращает форму для создания пользователя (для API можно пропустить)
        return response()->json(['message' => 'Provide data to create a user']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ]);

        // Создание пользователя
        $user = Users::create($validated);

        return response()->json($user, 201);
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
     * Show the form for editing the specified resource.
     */
    public function edit(Users $user)
    {
        // Возвращает форму для редактирования пользователя (для API можно пропустить)
        return response()->json(['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $user)
    {
        // Валидация данных
        $validated = $request->validate([
            'username' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
        ]);

        // Обновление данных пользователя
        $user->update($validated);

        return response()->json($user);
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