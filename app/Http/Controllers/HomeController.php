<?php
namespace App\Http\Controllers;

use App\Models\Perfil;


class HomeController extends Controller
{
    public function index()
    {
        $perfil = Perfil::first(); // Cargar los datos del perfil
        return view('home', compact('perfil'));
    }
}