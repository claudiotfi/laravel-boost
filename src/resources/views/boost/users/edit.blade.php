<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                clip-rule="evenodd" />
        </svg>
        <h1 class="h1 ms-3">Editar Usuário</h1>
    </x-slot>

    <x-slot name="tools">
        <x-btn-close route="boost.users.index"></x-btn-close>
        <x-btn-save></x-btn-save>
    </x-slot>

    <form action="{{ route('boost.users.update', $user->id) }}" id="admin-form" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control"
                required>
            @error('name')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control"
                required>
            @error('email')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
            @error('password')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @else
                <span class="block text-xs text-gray-500">
                    A senha deve ter ao menos uma letra minúscula, uma letra maiúscula e um número
                </span>
            @enderror

        </div>

        <div class="form-group">
            <label for="name">Restringir Horário de Acesso</label>
            <select name="time_id" id="time_id" class="form-control">
                <option value=""{{ $user->time_id ? '' : ' selected' }}>Nenhum</option>
                @foreach ($times as $time)
                    <option value="{{ $time->id }}"{{ $user->time_id == $time->id ? ' selected' : '' }}>
                        {{ $time->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-switch active="{{ $user->active }}" name="active" id="active">
            Ativo
        </x-switch>
        <x-switch active="{{ $user->only_allowed_ip }}" name="only_allowed_ip" id="only_allowed_ip">
            Restringir IP
        </x-switch>

        <div class="form-group">
            <h3>Funções</h3>
            @foreach ($roles as $role)
                <x-switch :active="in_array($role->id, $userRoles)" name="roles[{{ $role->id }}]" value="{{ $role->id }}"
                    id="{{ $role->id }}">
                    {{ $role->name }}
                </x-switch>
            @endforeach
        </div>

        <button type="submit" id="admin-form-submit" class="hidden"></button>
    </form>

</x-app-layout>
