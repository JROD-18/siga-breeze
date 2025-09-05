<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    // Indicar explícitamente la tabla si el nombre es irregular
    protected $table = 'perfils';

    protected $fillable = [
        'name', 
        'titulo', 
        'slogan', 
        'descripcion', 
        'direccion', 
        'celular', 
        'email', 
        'logo', 
        'logo2', 
        'seo', 
        'favicon', 
        'facebook', 
        'tiktok', 
        'instagram',
    ];
}
