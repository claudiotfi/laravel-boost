<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M15.988 3.012A2.25 2.25 0 0118 5.25v6.5A2.25 2.25 0 0115.75 14H13.5V7A2.5 2.5 0 0011 4.5H8.128a2.252 2.252 0 011.884-1.488A2.25 2.25 0 0112.25 1h1.5a2.25 2.25 0 012.238 2.012zM11.5 3.25a.75.75 0 01.75-.75h1.5a.75.75 0 01.75.75v.25h-3v-.25z"
                clip-rule="evenodd" />
            <path fill-rule="evenodd"
                d="M2 7a1 1 0 011-1h8a1 1 0 011 1v10a1 1 0 01-1 1H3a1 1 0 01-1-1V7zm2 3.25a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75zm0 3.5a.75.75 0 01.75-.75h4.5a.75.75 0 010 1.5h-4.5a.75.75 0 01-.75-.75z"
                clip-rule="evenodd" />
        </svg>
        <h1 class="h1 ms-3">Editar Função</h1>
    </x-slot>

    <x-slot name="tools">
        <x-btn-close route="boost.roles.index"></x-btn-close>
        <x-btn-save></x-btn-save>
    </x-slot>

    <form action="{{ route('boost.roles.update', $role->id) }}" id="role-form" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome da Função</label>
            <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}"
                class="form-control" required>
            @error('name')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <h3>Permissões</h3>
            @foreach ($permissions as $permission)
                <x-switch :active="in_array($permission->id, $rolePermissions)" name="permissions[{{ $permission->id }}]" value="{{ $permission->id }}"
                    id="{{ $permission->id }}">
                    {{ $permission->name }}
                </x-switch>
            @endforeach
        </div>

        <button type="submit" id="role-form-submit" class="hidden"></button>
    </form>

</x-app-layout>
