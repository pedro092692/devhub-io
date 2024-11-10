<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12" x-init="console.log('')">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}"
                    alt="{{ $course->name }}">
            </figure>
            <div class="text-white">
                <h2 class="text-4xl">{{ $course->name }}</h2>
                <h3 class="text-2xl mb-2">{{ $course->subtitle }}</h3>
                <p class="mb-2"><i class="fa-solid fa-chart-simple mr-2"></i>{{ __('Level:') }}
                    {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fa-solid fa-layer-group mr-2"></i>{{ __('Catagory:') }}
                    {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fa-solid fa-users mr-2"></i>{{ __('Enrolleds:') }} {{ ($course->students_count) ? $course->students_count : 'No Students Enrolled Yet.'}}
                </p>
                <p class="mb-2"><i class="fa-solid fa-star mr-2"></i>{{ __('Review:') }} {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4">
        {{-- course detail --}}
        <div class="order-2 lg:col-span-2 lg:order-1">
            {{-- what will you learn --}}
            <section class="card mb-12">
                <div class="card-body">
                    <h2 class="mb-4 font-bold text-2xl"><i class="fa-solid fa-trophy mr-2"></i>{{ __('What will you learn') }}
                    </h2>

                    {{-- course goal --}}
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li>
                                <i class="fa-regular fa-circle-check mr-2"> </i>{{ $goal->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            
            {{-- course description --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">{{__('Course Description')}}</h1>
                <div class="text-gray-700 text-base">
                    {{$course->description}}
                </div>   
            </section>
            

            {{-- content course --}}
            <section>
                <h2 class="font-bold text-3xl mb-4">{{ __('Course Content') }}</h2>
                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" 
                        @if ($loop->first)
                            x-data="{ open: true }"
                        @else
                            x-data="{ open: false }"
                        @endif>
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h2 class="font-bold text-lg text-gray-600">{{ $section->name }}</h2>
                        </header>
                        <div class="bg-white px-4 py-2" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fa-solid fa-circle-play mr-2 text-gray-600"></i>{{ $lesson->name }}</li>
                                @endforeach
                               
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>
            {{-- requirements --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl">Requiremets</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-bae">{{__($requirement->name)}}</li>
                    @endforeach
                </ul>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    {{-- professor info --}}
                    <div class="flex items-center gap-4 ">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{ $course->teacher->profile_photo_url }}" alt="{{ $course->teacher->name }}">
                    {{-- professor name --}}
                        <div>
                            <h2 class="font-bold text-gray-400 text-xl">Prof. {{ $course->teacher->name }}</h2>
                            <a href="" class="text-blue-400 text-sm font-bold">{{'@'.Str::slug($course->teacher->name, '') }}</a>
                        </div>
                    </div>
                    
                    @can('enrolled', $course)
                        {{-- Course Enrroled --}}
                        <a href="{{route('course.status', $course)}}" class="btn btn-danger btn-block mt-4">{{__('Continue This Course')}}</a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block mt-4">{{__('Enroll To This Course')}}</button>
                        </form>
                    @endcan
                </div>
            </section>

            {{-- similar courses --}}
            <aside class="hidden mt-4 lg:block">
                <h2 class="font-bold text-xl text-gray-700 mb-2">{{__('Related Courses')}}</h2>
                @foreach ($similar as $alike)
                    <article class="flex gap-2 mb-4">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($alike->image->url)}}" alt="">
                        <div>
                            <a class="font-bold text-gray-500" href="{{ route('courses.show', $alike) }}">{{ Str::limit($alike->name, 40) }}</a>
                            {{-- professor --}}
                            <div class="flex items-center gap-2 mt-1 mb-2">
                                <img class="h-10 w-10 object-cover rounded-full shadow-lg" src="{{$alike->teacher->profile_photo_url}}" alt="">
                                <a href="" class="text-blue-400 text-sm font-bold">{{'@'.Str::slug($alike->teacher->name, '') }}</a>
                            </div>
                            {{-- review --}}
                            {{-- <p class="text-sm"><i class="fa-solid fa-star mr-2 text-yellow-400"></i>{{ $alike->rating }}</p> --}}
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

</x-app-layout>
