<?php

namespace App\Http\Controllers\Boost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::query()
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('guard_name', 'LIKE', "%$request->search%")
            ->paginate(10);

        return view('boost.roles.index', compact('roles', 'request'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('boost.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->save();

        $permissions = collect($request->input('permissions', []))->keys()->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('boost.roles.index')->with('success', 'Role criada com sucesso.');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('boost.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            //'guard_name' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $permissions = collect($request->input('permissions', []))->keys()->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('boost.roles.index')
            ->with('success', 'Função atualizada');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $role->delete();

        return redirect('access/roles')->with('success', 'Função excluída com sucesso.');
    }
}
