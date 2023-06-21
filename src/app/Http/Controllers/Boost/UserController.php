<?php

namespace App\Http\Controllers\Boost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;
use App\Models\Time;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('boost.dashboard');
    }

    public function index(Request $request)
    {
        $users = User::query()
            ->with('roles', 'time')
            ->where('name', 'LIKE', "%$request->search%")
            ->orWhere('email', 'LIKE', "%$request->search%")
            ->paginate(30);

        return view('boost.users.index', compact('users', 'request'));
    }

    public function create()
    {
        $roles = Role::all();
        $times = Time::all();
        return view('boost.users.create', compact('roles', 'times'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => [
                'nullable',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'email.unique' => 'O email fornecido já está em uso.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.',
        ]);

        // Criar um novo usuário
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->time_id = $request->input('time_id');
        $user->active = $request->input('active') ? true : false; // Definir o valor do campo "active" com base no botão "Ativo"
        $user->only_allowed_ip = $request->input('only_allowed_ip') ? true : false; // Definir o valor do campo "active" com base no botão "Ativo"

        // Verificar se a senha foi fornecida e definir
        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }

        // Salvar o novo usuário
        $user->save();

        $roles = collect($request->input('roles', []))->keys()->toArray();
        $user->roles()->sync($roles);

        // Redirecionar de volta com mensagem de sucesso
        return redirect('boost/users')->with('success', 'Usuário criado com sucesso.');
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'Usuário não encontrado.');
        }

        $roles = Role::all();
        $times = Time::all();
        $userRoles = $user->roles()->pluck('id')->toArray();

        return view('boost.users.edit', compact('user', 'roles', 'userRoles', 'times'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'password' => [
                'nullable',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            ],
        ], [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço de e-mail válido.',
            'email.unique' => 'O email fornecido já está em uso.',
            'password.min' => 'A senha deve ter no mínimo :min caracteres.',
            'password.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->time_id = $request->input('time_id');
        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = Hash::make($password);
        }
        $user->active = $request->has('active');
        $user->only_allowed_ip = $request->has('only_allowed_ip');
        $user->save();

        $roles = collect($request->input('roles', []))->keys()->toArray();
        $user->roles()->sync($roles);

        return redirect('boost/users')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->deleted_by = auth()->id();
        $user->save();
        $user->delete();

        return redirect('boost/users')->with('success', 'Usuário excluído com sucesso.');
    }

    public function editme()
    {
        $user = Auth::user();
        return view('boost.profile.edit', compact('user'));
    }

    public function updateme(Request $request)
    {
        $user = Auth::user();

        // Validação dos campos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'password_old' => 'nullable|string',
        ]);

        // Verificar se a senha antiga está correta
        if ($request->has('password_old') && !empty($request->password_old)) {
            if (!Hash::check($request->password_old, $user->password)) {
                return redirect()->back()->withErrors(['password_old' => 'A senha antiga está incorreta.']);
            }
            if ($request->password != $request->password_confirmation) {
                return redirect()->back()->withErrors(['password' => '"Nova Senha" e "Confirmar Nova Senha" precisam ser iguais.']);
            }
            $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->email = $request->email;
        }

        $user->dark_mode = $request->boolean('dark_mode');
        $user->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso.');
    }


}
