<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                clip-rule="evenodd" />
        </svg>
        <h1 class="h1 ms-3">Meus Dados</h1>
    </x-slot>

    <x-slot name="tools">
        <x-btn-close route="dashboard"></x-btn-close>
        <x-btn-save></x-btn-save>
    </x-slot>

    <form action="{{ route('boost.profile.update', $user->id) }}" id="admin-form" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" id="admin-form-submit" class="hidden"></button>

        <div class="grid grid-cols-3 gap-4 border border-gray-700 p-5">
            <div class="form-group ">
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
            <div class="form-control"></div>
            <div class="form-group">
                <label for="password">Nova Senha</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password"
                    value="">
                @error('password')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
                <span class="block text-xs text-gray-500">
                    A senha deve ter ao menos uma letra minúscula, uma letra maiúscula e um número
                </span>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmar Nova Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_old">Senha Antiga</label>
                <input type="password" name="password_old" id="password_old" class="form-control">
                @error('password_old')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
                <span class="block text-xs text-gray-500">
                    Informe a senha antiga para poder alterar qualquer informação dentro do quadro
                </span>
            </div>
        </div>
        <div class="form-group">
            <x-switch active="{{ $user->dark_mode }}" name="dark_mode" id="dark_mode">
                Dark Mode
            </x-switch>
        </div>
    </form>

</x-app-layout>
