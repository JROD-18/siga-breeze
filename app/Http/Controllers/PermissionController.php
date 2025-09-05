<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view permissions')->only('index');
        $this->middleware('permission:create permissions')->only(['create', 'store']);
        $this->middleware('permission:edit permissions')->only(['edit', 'update']);
        $this->middleware('permission:eliminar permissions')->only('destroy');

    }

    public function index()
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(10);
        return view('permissions.list', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->route('permissions.create')
                ->withErrors($validator)
                ->withInput();
        }

        Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permiso agregado exitosamente.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:permissions,name,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('permissions.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success', 'Permiso guardado exitosamente.');
    }

    // Recibe $id directamente desde la URL
public function destroy($id)
{
    $permission = Permission::find($id);

    if (!$permission) {
        return redirect()->route('permissions.index')->with('error', 'Permiso no encontrado.');
    }

    $permission->delete();

    return redirect()->route('permissions.index')->with('success', 'Permiso eliminado correctamente.');
}





}
