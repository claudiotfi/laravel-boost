<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M10 1a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 1zM5.05 3.05a.75.75 0 011.06 0l1.062 1.06A.75.75 0 116.11 5.173L5.05 4.11a.75.75 0 010-1.06zm9.9 0a.75.75 0 010 1.06l-1.06 1.062a.75.75 0 01-1.062-1.061l1.061-1.06a.75.75 0 011.06 0zM3 8a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5A.75.75 0 013 8zm11 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5A.75.75 0 0114 8zm-6.828 2.828a.75.75 0 010 1.061L6.11 12.95a.75.75 0 01-1.06-1.06l1.06-1.06a.75.75 0 011.06 0zm3.594-3.317a.75.75 0 00-1.37.364l-.492 6.861a.75.75 0 001.204.65l1.043-.799.985 3.678a.75.75 0 001.45-.388l-.978-3.646 1.292.204a.75.75 0 00.74-1.16l-3.874-5.764z"
                clip-rule="evenodd" />
        </svg>
        <h1 class="h1 ms-3">Editar IP</h1>
    </x-slot>

    <x-slot name="tools">
        <x-btn-close route="boost.ips.index"></x-btn-close>
        <x-btn-save></x-btn-save>
    </x-slot>

    <form action="{{ route('boost.ips.update', $ip->id) }}" id="admin-form" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ip" class="mb-1">IP</label>
            <input type="text" name="ip" id="ip" value="{{ $ip->ip }}" class="form-control"
                required>
            @error('ip')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="mb-1">Descrição <span
                    class="badge-secondary text-xs">Opcional</span></label>
            <input type="text" name="description" id="description" value="{{ $ip->description }}"
                class="form-control">
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" id="admin-form-submit" class="hidden"></button>
    </form>


</x-app-layout>
