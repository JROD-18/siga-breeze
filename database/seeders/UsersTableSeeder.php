<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Necesario para encriptar la contraseña

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Desactiva temporalmente las claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Elimina todos los registros y reinicia el contador de IDs
        DB::table('users')->truncate();

        $users = [
            [
                'id' => 1,
                'name' => 'VENUS Borges',
                'apellido' => 'Borges',
                'cedula' => '12345678',
                'email' => 'josephg.rodriguezg@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'), // 🔐 Contraseña encriptada
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // Reactiva las claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
