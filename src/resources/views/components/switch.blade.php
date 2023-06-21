@props(['active' => false, 'name', 'id'])

<div x-data="{ active: {{ $active ? 'true' : 'false' }} }" class="form-group">
    <label for="{{ $id }}" class="flex items-center cursor-pointer">
        <span class="relative inline-flex items-center">
            <span :class="{ 'bg-blue-500 dark:bg-teal-500': active, 'bg-gray-500': !active }"
                class="block w-12 h-6 rounded-full"></span>
            <span :class="{ 'translate-x-6': active, 'translate-x-0': !active }"
                class="absolute left-0 top-0 w-6 h-6 bg-white rounded-full transition-transform duration-200 ease-in-out"></span>
            <span class="ml-2">{{ $slot }}</span>
        </span>
        <input type="checkbox" name="{{ $name }}" id="{{ $id }}" x-model="active" class="hidden">
    </label>
</div>
