<div>
    {{-- filter bar --}}
    <div class="bg-gray-200 py-4 mb-8">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row gap-4 ">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700" wire:click="resetFilters">
                <i class="fa-solid fa-layer-group text-sm mr-2"></i>
                {{ __('All courses') }}
            </button>
            <!-- Dropdown Catagory -->
            <div class="relative" x-data="{ open: false }">
                <button class="block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fa-solid fa-tags tex-sm mr-2"></i>
                    {{__('Category')}}
                    <i class="fa-solid fa-chevron-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-full  mt-1 py-2 bg-white border rounded-lg shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-700 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">
                            {{ __($category->name) }}
                        </a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown Catagory -->
            <!-- Dropdown Level -->
            <div class="relative" x-data="{ open: false }">
                <button class="block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fa-solid fa-laptop-code text-sm mr-2"></i>
                    {{__('Level')}}
                    <i class="fa-solid fa-chevron-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-full  mt-1 py-2 bg-white border rounded-lg shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($levels as $level)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-700 hover:text-white">
                            {{ $level->name }}
                        </a>
                    @endforeach
                    
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown Level -->
        </div>
    </div>
    <section class="max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto sm:px-4 md:px-0 grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 mb-6">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
        <div class="mx-auto">
            {{ $courses->links(data: ['scrollTo' => false]) }}
        </div>
    </section>
</div>
