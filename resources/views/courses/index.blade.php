<x-app-layout>
    {{-- hero section --}}
    <section class="bg-cover h-50vh" style="background-image: url({{ asset('img/courses/cover_1.jpg') }})">
        <div class="flex h-full  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="padding-top: 20vh">
            <div class="w-full">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-white font-bold text-4xl">
                        {{ __('Thes best free courses online') }}
                    </h1>
                    <p class="text-white text-lg mt-2">
                        {{ __('You are just one step away from enhancing your knowledge, there is surely a course for you, it is time to start.') }}
                    </p>
                </div>
                <!-- Search component -->
                @livewire('search')
            </div>
        </div>
    </section>
    {{-- filter bar --}}
    @livewire('course-index')
</x-app-layout>
