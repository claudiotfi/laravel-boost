<x-app-layout>
    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path
                d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
        </svg>
        <h1 class="h1 ms-3">
            {{ __('Users') }}
        </h1>
    </x-slot>
    <x-slot name="tools">
        <x-search route="boost.users.index" search="{{ $request->search }}"></x-search>
        <x-btn-add route="boost.users.create"></x-btn-add>
        <x-btn-close route="boost.dashboard"></x-btn-close>
    </x-slot>

    @if (count($users))
        <table class="table-bordered">
            <thead>
                <tr>
                    <th class="text-center">
                        <span>Ativo</span>
                    </th>
                    <th class="text-start">
                        <span>Nome</span>
                    </th>
                    <th class="text-start">
                        <span>E-mail</span>
                    </th>
                    <th class="text-start">
                        <span>Funções</span>
                    </th>
                    <th class="text-center">
                        <span>Restrição de IP</span>
                    </th>
                    <th class="text-center">
                        <span>Restrição de Horário</span>
                    </th>
                    <th class="text-end">
                        <span class="me-3">Ações</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <div class="flex items-center justify-center">
                                @if ($user->active)
                                    <span class="status-success"></span>
                                @else
                                    <span class="status-danger"></span>
                                @endif
                            </div>
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="flex space-x-2">
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-yellow-500 text-gray-950 text-sm">{{ $role->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center">
                            @if ($user->only_allowed_ip)
                                <span class="badge-danger">Restrito</span>
                            @else
                                <span class="badge-success">Liberado</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($user->time)
                                <span class="badge-danger">{{ $user->time->name }}</span>
                            @else
                                <span class="badge-success">Liberado</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex justify-end items-center">
                                <form action="{{ route('boost.users.destroy', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza de que deseja excluir este usuário?')"
                                        class="btn text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
                                            <path fill-rule="evenodd"
                                                d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                                <a href="{{ route('boost.users.edit', $user) }}" class="btn text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="flex items-center justify-center h-full">
            Nenhum usuário encontrado
        </div>
    @endif
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</x-app-layout>
