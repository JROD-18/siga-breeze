<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('perfils')->insert([
            [
                'name' => 'Empresa Ejemplo',
                'titulo' => 'Bienvenidos a Empresa Ejemplo',
                'slogan' => 'Innovación y Excelencia',
                'descripcion' => 'Empresa Ejemplo es líder en el sector, ofreciendo productos y servicios de calidad excepcional.',
                'seo' => 'empresa-ejemplo-seo.jpg',
                'logo' => 'empresa-ejemplo-logo.png',
                'logo2' => 'empresa-ejemplo-logo.png',
                'direccion' => 'Calle Principal #123, Ciudad, País',
                'celular' => '12345678901',
                'email' => 'contacto@empresa.com',
                'favicon' => 'empresa-ejemplo-favicon.ico',
                'facebook' => 'https://facebook.com/empresa',
                'tiktok' => 'https://tiktok.com/@empresa',
                'instagram' => 'https://instagram.com/empresa',
            ],
        ]);
    }
}
