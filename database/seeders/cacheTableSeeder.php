<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CacheTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cache')->insert([
            'key' => 'spatie.permission.cache',
            'value' => serialize([
                'alias' => [
                    'a' => 'id',
                    'b' => 'roles',
                    'c' => 'permissions',
                    'd' => 'role_has_permissions',
                ],
                // Puedes agregar otros datos según la lógica de tu sistema.
            ]),
            'expiration' => now()->addDays(30)->timestamp, // Expira en 30 días
        ]);
       
    }
}
