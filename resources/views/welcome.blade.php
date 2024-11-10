@php
    $cover_images = ['cover_1','cover_2','cover_3','cover_4'];
    $image = $cover_images[array_rand($cover_images)];
@endphp


<x-app-layout>
    {{-- hero section --}}
    <section class="bg-cover h-screen" style="background-image: url({{ asset('img/home/'.$image.'.jpg') }})">
        @livewire('navigation-menu')
        <div class="flex h-full  max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="padding-top: 20vh">
            <div class="w-full">
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <h1 class="text-white font-bold text-4xl">
                        {{__('Welcome to devhub the best FREE site to learn coding.')}}
                    </h1>
                    <p class="text-white text-lg mt-2">
                        {{__('At devhub you will find courses, manuals and articles that will help you become a development professional..')}}
                    </p>
                </div>
                <!-- Search component -->
                @livewire('search')
            </div>
        </div>
    </section>
    {{-- content section --}}
    <section class="mt-8 max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-gray-600 text-3xl uppercase mb-6">
            {{__('Popular Categories')}}
        </h1>
        <div class="max-w-7xl mx-auto  grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4  gap-x-6 gap-y-8">
            <article class="bg-slate-50 shadow-sm rounded-xl transition ease-in-out delay-150  hover:shadow-xl cursor-pointer duration-300">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/image_ (1).jpg')}}" alt="">
                </figure>
                <header class="mt-4 px-4">
                    <h1 class="text-center text-xl text-gray-700">
                        {{__('Programming Courses')}}
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 pb-4">
                        {{__('Find a lot of free quality programming courses.')}}
                    </p>
                </header>
            </article>
            
            <article class="bg-slate-50 shadow-sm rounded-xl transition ease-in-out delay-150  hover:shadow-xl cursor-pointer duration-300">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/image_ (2).jpg')}}" alt="">
                </figure>
                <header class="mt-4 px-4">
                    <h1 class="text-center text-xl text-gray-700">
                        Guies
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 pb-4">
                        {{__('Find a lot of varity documentations.')}}
                    </p>
                </header>
            </article>
            
            <article class="bg-slate-50 shadow-sm rounded-xl transition ease-in-out delay-150  hover:shadow-xl cursor-pointer duration-300">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/image_ (3).jpg')}}" alt="">
                </figure>
                <header class="mt-4 px-4">
                    <h1 class="text-center text-xl text-gray-700">
                        {{__('Toturials')}}
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 pb-4">
                        {{__("Find popular tutorials in a bunch of language if you don't know how to start this is a great way!.")}}
                    </p>
                </header>
            </article>
            
            <article class="bg-slate-50 shadow-sm rounded-xl transition ease-in-out delay-150  hover:shadow-xl cursor-pointer duration-300">
                <figure>
                    <img class="rounded-t-xl h-36 w-full object-cover" src="{{asset('img/home/image_ (4).jpg')}}" alt="">
                </figure>
                <header class="mt-4 px-4">
                    <h1 class="text-center text-xl text-gray-700">
                        {{__('Intructors ')}}
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 pb-4">
                        {{__('Find content of your favorites content creators.')}}
                    </p>
                </header>
            </article>
        </div>
    </section>
    {{-- call to action --}}
    <section class="flex gap-10 flex-shrink-0 h-50vh mt-8 mx-auto" style="background: linear-gradient(270deg, rgba(6, 7, 20, 0.28) 22%, rgba(0, 0, 0, 0.00) 83.11%), url({{ asset('img/home/call_to_action.jpg') }}), lightgray; background-size: cover; background-repeat: no-repeat background-position: center;">
        <div class="p-4 px-12 flex flex-col justify-center items-end grow gap-12 self-stretch">
            <div class="w-full flex flex-col justify-center items-end md:w-30vw">
                <h1 class="text-white text-4xl">{{__("You don't know what course to take?")}}</h1>
                <p class="text-white mt-2 text-md">{{__('You can go to the catalog courses and see all and filter them by difficulty and language.')}}</p>
            </div>
            <div class="w-full flex justify-center items-center md:w-30vw">
                <a href="{{route('courses.index')}}" class="bg-white flex-1 text-center font-bold py-2 px-4 rounded">
                    {{__('Courses Catalog')}}
                </a>
            </div>
            
        </div>
        
    </section>
    {{-- lastest courses --}}
    <section class="mt-8 max-w-7xl px-4 mx-auto sm:px-6 lg:px-8">
        <h1 class="text-3xl text-gray-600 capitalize">
            {{__('Lastest courses')}}
        </h1>
        <p class="mt-1 text-gray-600 text-md mb-6">
            {{__('What course are you searching out?')}}
        </p>
        <div class="max-w-7xl mx-auto sm:px-4 md:px-0 grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>
