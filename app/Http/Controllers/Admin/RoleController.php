<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:Listar rol')->only('index');
        $this->middleware('can:Crear rol')->only('create', 'store');
        $this->middleware('can:Editar rol')->only('edit', 'update');
        $this->middleware('can:Eliminar rol')->only('destroy');
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name' => $request->name
        ]);

        $role->permissions()->attach($request->permissions);

        return redirect()->route('admin.roles.index')->with('message', 'Rol Creado satisfactoriamente');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        if ($request->has('name')) {
            $role->update([
                'name' => $request->name
            ]);
        }

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()->route('admin.roles.edit')->with('message', 'Rol editado satisfactoriamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('message', 'El rol se elimino con exito');
    }
}
