<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['id' => 2, 'name' => 'superadmin', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:32:22', 'updated_at' => '2025-01-02 18:32:22'],
            ['id' => 3, 'name' => 'admin', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:44:08', 'updated_at' => '2025-01-02 18:44:08'],
            ['id' => 4, 'name' => 'usuario', 'guard_name' => 'web', 'created_at' => '2025-01-02 19:10:04', 'updated_at' => '2025-01-02 19:10:04'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

