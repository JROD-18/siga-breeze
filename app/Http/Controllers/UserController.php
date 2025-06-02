<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view users')->only('index');
        $this->middleware('permission:create users')->only(['create', 'store']);
        $this->middleware('permission:edit users')->only(['edit', 'update']);
        $this->middleware('permission:destroy users')->only('destroy');
    }


    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.list', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::orderBy('name', 'ASC')->get();
        return view('users.create', ['roles' => $roles]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|min:3',
            'email'            => 'required|email|unique:users,email',
            'password'         => 'required|min:5|confirmed', // usa confirmed para validar confirm_password
            // 'confirm_password' => 'required',  // no necesario si usas confirmed
            'role'             => 'required|array', // Validar que roles lleguen y sea arreglo
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('name', 'ASC')->get();
        $hasRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit', compact('user', 'roles', 'hasRoles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name'  => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|array',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)->withInput()->withErrors($validator);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario guardado exitosamente.');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            session()->flash('error', 'Usuario no encontrado');
            return response()->json(['status' => false]);
        }

        $user->delete();

        session()->flash('success', 'Usuario eliminado correctamente.');
        return response()->json(['status' => true]);
    }
}
