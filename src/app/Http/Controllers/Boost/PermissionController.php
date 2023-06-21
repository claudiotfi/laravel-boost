<?php

namespace App\Http\Controllers\Boost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::where('name', 'like', "%{$request->search}%")->paginate(30);
        return view('boost.permissions.index', compact('permissions', 'request'));
    }

    public function create()
    {
        return view('boost.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z0-9_\-.]+$/', 'unique:permissions'],
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('boost.permissions.index')->with('success', 'Permissão criada com sucesso.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('boost.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name,' . $id, 'regex:/^[a-zA-Z0-9_\-.]+$/'],
        ]);

        $permission->name = $validatedData['name'];
        $permission->save();

        return redirect()->route('boost.permissions.index')->with('success', 'Permissão atualizada com sucesso.');
    }


    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        return redirect()->route('boost.permissions.index')->with('success', 'Permissão excluída com sucesso.');
    }

}
