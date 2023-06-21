<x-app-layout>

    <x-slot name="header">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd"
                d="M10 1a.75.75 0 01.75.75v1.5a.75.75 0 01-1.5 0v-1.5A.75.75 0 0110 1zM5.05 3.05a.75.75 0 011.06 0l1.062 1.06A.75.75 0 116.11 5.173L5.05 4.11a.75.75 0 010-1.06zm9.9 0a.75.75 0 010 1.06l-1.06 1.062a.75.75 0 01-1.062-1.061l1.061-1.06a.75.75 0 011.06 0zM3 8a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5A.75.75 0 013 8zm11 0a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5A.75.75 0 0114 8zm-6.828 2.828a.75.75 0 010 1.061L6.11 12.95a.75.75 0 01-1.06-1.06l1.06-1.06a.75.75 0 011.06 0zm3.594-3.317a.75.75 0 00-1.37.364l-.492 6.861a.75.75 0 001.204.65l1.043-.799.985 3.678a.75.75 0 001.45-.388l-.978-3.646 1.292.204a.75.75 0 00.74-1.16l-3.874-5.764z"
                clip-rule="evenodd" />
        </svg>
        <h1 class="h1 ms-3">Adicionar Regra de Horário</h1>
    </x-slot>

    <x-slot name="tools">
        <x-btn-close route="boost.times.index"></x-btn-close>
        <x-btn-save></x-btn-save>
    </x-slot>

    <form action="{{ route('boost.times.store') }}" id="admin-form" method="POST">
        @csrf

        <div class="grid grid-cols-3 gap-x-4 px-72 mb-10">
            <div class="flex items-center justify-end">Nome da Regra</div>
            <div class="col-span-2">
                <div class="form-group">
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="form-control">
                    @error('name')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end">Mensagem de Acesso Negado</div>
            <div class="col-span-2">
                <div class="form-group">
                    <input type="text" name="message" id="message" value="{{ old('message') }}"
                        class="form-control w-72">
                    @error('message')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-span-3 grid grid-cols-3 py-3">
                <div class="flex items-center"></div>
                <div class="flex items-center justify-center">Entrada</div>
                <div class="flex items-center justify-center">Saída</div>
            </div>

            <div class="flex items-center justify-end">Segunda-feira</div>
            <div class="form-group">
                <input type="time" name="ini_segunda" value="{{ old('ini_segunda') }}"
                    class="form-control text-center" required>
                @error('ini_segunda')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_segunda" id="end" value="{{ old('fin_segunda') }}"
                    class="form-control text-center" required>
                @error('fin_segunda')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Terça-feira</div>
            <div class="form-group">
                <input type="time" name="ini_terca" value="{{ old('ini_terca') }}" class="form-control text-center"
                    required>
                @error('ini_terca')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_terca" id="end" value="{{ old('fin_terca') }}"
                    class="form-control text-center" required>
                @error('fin_terca')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Quarta-feira</div>
            <div class="form-group">
                <input type="time" name="ini_quarta" value="{{ old('ini_quarta') }}"
                    class="form-control text-center" required>
                @error('ini_quarta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_quarta" id="end" value="{{ old('fin_quarta') }}"
                    class="form-control text-center" required>
                @error('fin_quarta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Quinta-feira</div>
            <div class="form-group">
                <input type="time" name="ini_quinta" value="{{ old('ini_quinta') }}"
                    class="form-control text-center" required>
                @error('ini_quinta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_quinta" id="end" value="{{ old('fin_quinta') }}"
                    class="form-control text-center" required>
                @error('fin_quinta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Sexta-feira</div>
            <div class="form-group">
                <input type="time" name="ini_sexta" value="{{ old('ini_sexta') }}" class="form-control text-center"
                    required>
                @error('ini_sexta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_sexta" id="end" value="{{ old('fin_sexta') }}"
                    class="form-control text-center" required>
                @error('fin_sexta')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Sábado</div>
            <div class="form-group">
                <input type="time" name="ini_sabado" value="{{ old('ini_sabado') }}"
                    class="form-control text-center" required>
                @error('ini_sabado')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_sabado" id="end" value="{{ old('fin_sabado') }}"
                    class="form-control text-center" required>
                @error('fin_sabado')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center justify-end">Domingo</div>
            <div class="form-group">
                <input type="time" name="ini_domingo" value="{{ old('ini_domingo') }}"
                    class="form-control text-center" required>
                @error('ini_domingo')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="time" name="fin_domingo" id="end" value="{{ old('fin_domingo') }}"
                    class="form-control text-center" required>
                @error('fin_domingo')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" id="admin-form-submit" class="hidden"></button>
    </form>

</x-app-layout>
