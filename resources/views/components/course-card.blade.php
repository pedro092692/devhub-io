@props(['course'])

<article class="card">
    <figure class="aspect-w-16 aspect-h-9">
        <img src="{{Storage::url($course->image->url)}}" alt="" class="h-40 w-full object-cover">
    </figure>
    <div class="card-body">
        <h2 class="card-title">
            {{Str::limit($course->name, 40, '...')}}
        </h2>
        <p class="text-gray-500 text-sm mb-1 mt-auto">
            {{__('Professor')}}: {{$course->teacher->name}}
        </p> 

        <div class="mt-3 flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i></li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{$course->students_count}})
            </p>
        </div>
        
        <a href="{{route('courses.show', $course)}}" class="mt-4  btn btn-block btn-primary">
            {{__('More info')}}
         </a>
    </div>
</article>