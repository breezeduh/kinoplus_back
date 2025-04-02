<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Запуск сидера.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'editor', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'guard_name' => $role['guard_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
