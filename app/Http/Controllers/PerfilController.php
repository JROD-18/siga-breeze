<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view perfil')->only(['index']);
    }

    public function index()
    {
        $perfil = Perfil::first();
        return view('perfil.index', compact('perfil'));
    }

    public function update(Request $request)
    {
        // Valida los datos recibidos
        $request->validate([
            'name' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'slogan' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'required|string|max:255',
            'celular' => 'required|string|max:11',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image',
            'logo2' => 'nullable|image',
            'seo' => 'nullable|image',
            'favicon' => 'nullable|image',
            'facebook' => 'nullable|url|max:255',
            'tiktok' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);

        $perfil = Perfil::first() ?? new Perfil();

        // Manejo de imágenes
        if ($request->hasFile('logo')) {
            if ($perfil->logo) {
                Storage::delete('public/' . $perfil->logo);
            }
            $perfil->logo = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('logo2')) {
            if ($perfil->logo2) {
                Storage::delete('public/' . $perfil->logo2);
            }
            $perfil->logo2 = $request->file('logo2')->store('logos2', 'public');
        }

        if ($request->hasFile('seo')) {
            if ($perfil->seo) {
                Storage::delete('public/' . $perfil->seo);
            }
            $perfil->seo = $request->file('seo')->store('seo_images', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($perfil->favicon) {
                Storage::delete('public/' . $perfil->favicon);
            }
            $perfil->favicon = $request->file('favicon')->store('favicons', 'public');
        }

        // Asignar campos no relacionados con archivos
        $perfil->fill($request->except(['logo', 'logo2', 'seo', 'favicon']));

        $perfil->save();

        return redirect()->route('perfil.index')->with('status', 'Perfil actualizado con éxito.');
    }
}
