<form class="relative mt-4 w-full md:w-4/5" autocomplete="off">
    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </div>
    <input type="search" id="default-search" wire:model.live="search"
        class="block p-4 w-full pl-10 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="" required>
    <button type="submit"
        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search
    </button>
    @if ($search)
        <ul class="absolute w-full bg-white mt-1 rounded-lg shadow-md overflow-hidden z-40">
            @forelse ($this->results as $result)
                <li class="px-4 leading-10 text-sm cursor-pointer hover:bg-gray-300">
                    <a href="{{ route('courses.show', $result) }}">
                        {{ $result->name }}
                    </a>
                </li>
            @empty
            <li class="px-4 leading-10 text-sm cursor-pointer hover:bg-gray-300">
                {{__('There is no courses with '. "'$search'" . '😢')}}
            </li>
            @endforelse
        </ul>
    @endif
</form>
