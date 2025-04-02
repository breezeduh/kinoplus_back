<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Запуск сидера.
     */
    public function run(): void
    {
        Users::create([
            'username' => 'admin_user',
            'email' => 'admin@example.com',
            'password' => Hash::make('securepassword'), // Шифрование пароля
            'first_name' => 'Admin',
            'last_name' => 'User',
        ]);

        // Присвоение роли администратора
        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $adminUser = Users::where('email', 'admin@example.com')->first();
        $adminUser->roles()->attach($adminRole->id);
    }
}
