<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view roles')->only('index');
        $this->middleware('permission:edit roles')->only('edit', 'update');
        $this->middleware('permission:create roles')->only('create', 'store');
        $this->middleware('permission:destroy roles')->only('destroy');
    }

   public function index()
{
    $roles = Role::orderBy('id', 'DESC')->paginate(5);
    return view('roles.list', compact('roles'));
}


    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);

            if (!empty($request->permission)) {
                $role->givePermissionTo($request->permission);
            }

            return redirect()->route('roles.index')->with('success', 'ROL agregado exitosamente.');
        }

        return redirect()->route('roles.create')->withInput()->withErrors($validator);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name', 'ASC')->get();

        return view('roles.edit', compact('role', 'permissions', 'hasPermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,' . $id
        ]);

        if ($validator->passes()) {
            $role->name = $request->name;
            $role->save();

            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.index')->with('success', 'ROL guardado exitosamente.');
        }

        return redirect()->route('roles.edit', $id)->withInput()->withErrors($validator);
    }

    public function destroy($id)
{
    $role = Role::find($id);

    if (!$role) {
        return redirect()->route('roles.index')->with('error', 'Rol no encontrado.');
    }

    try {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente.');
    } catch (\Exception $e) {
        return redirect()->route('roles.index')->with('error', 'Error al eliminar el rol.');
    }
}

}
