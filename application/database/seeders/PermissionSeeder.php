<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Запуск сидера.
     */
    public function run(): void
    {
        $permissions = [
            'view_users',
            'create_users',
            'update_users',
            'delete_users',
            'view_roles',
            'create_roles',
            'update_roles',
            'delete_roles',
            'view_permissions',
            'create_permissions',
            'update_permissions',
            'delete_permissions',
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission,
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
