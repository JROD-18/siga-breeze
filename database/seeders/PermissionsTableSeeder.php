<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
            $permissions = [
                ['id' => 1, 'name' => 'ver articulos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:00:00', 'updated_at' => '2025-01-02 18:00:00'],
                ['id' => 2, 'name' => 'editar articulos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:01:00', 'updated_at' => '2025-01-02 18:01:00'],
                ['id' => 3, 'name' => 'eliminar articulos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:02:00', 'updated_at' => '2025-01-02 18:02:00'],
                ['id' => 4, 'name' => 'crear articulo', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:03:00', 'updated_at' => '2025-01-02 18:03:00'],
                ['id' => 5, 'name' => 'ver roles', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:04:00', 'updated_at' => '2025-01-02 18:04:00'],
                ['id' => 6, 'name' => 'crear roles', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:05:00', 'updated_at' => '2025-01-02 18:05:00'],
                ['id' => 7, 'name' => 'editar roles', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:06:00', 'updated_at' => '2025-01-02 18:06:00'],
                ['id' => 8, 'name' => 'eliminar roles', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:07:00', 'updated_at' => '2025-01-02 18:07:00'],
                ['id' => 9, 'name' => 'ver permisos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:08:00', 'updated_at' => '2025-01-02 18:08:00'],
                ['id' => 10, 'name' => 'crear permisos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:09:00', 'updated_at' => '2025-01-02 18:09:00'],
                ['id' => 11, 'name' => 'editar permisos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:10:00', 'updated_at' => '2025-01-02 18:10:00'],
                ['id' => 12, 'name' => 'eliminar permisos', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:11:00', 'updated_at' => '2025-01-02 18:11:00'],
                ['id' => 13, 'name' => 'ver usuarios', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:12:00', 'updated_at' => '2025-01-02 18:12:00'],
                ['id' => 14, 'name' => 'editar usuarios', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:13:00', 'updated_at' => '2025-01-02 18:13:00'],
                ['id' => 15, 'name' => 'crear usuarios', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:14:00', 'updated_at' => '2025-01-02 18:14:00'],
                ['id' => 16, 'name' => 'eliminar usuario', 'guard_name' => 'web', 'created_at' => '2025-01-02 18:15:00', 'updated_at' => '2025-01-02 18:15:00'],
               
            ];
            
        DB::table('permissions')->insert($permissions);
    }
}
