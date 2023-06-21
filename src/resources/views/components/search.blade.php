@props(['route', 'search'])

<form action="{{ route($route) }}" method="GET">
    <div class="flex items-center">
        <div class="relative">
            <input type="text" name="search" id="search" value="{{ $search }}" class="form-control">
            @if (!empty($search))
                <button type="button" class="btn-absolute" onclick="resetForm()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 dark:text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <button type="submit" class="btn-absolute hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 dark:text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            @else
                <button type="submit" class="btn-absolute">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 dark:text-gray-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            @endif
        </div>
    </div>
    <script>
        function resetForm() {
            document.getElementById('search').value = '';
            document.forms[0].submit();
        }
    </script>
</form>
