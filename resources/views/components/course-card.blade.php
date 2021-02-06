@props(['course'])

<article class="card flex flex-col">
    <img class="h-41 sm:h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="text-xl mb-2"> {{$course->name}}</h1>
        <p class="text-sm"> {{Str::limit($course->description,50)}}</p>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof. {{$course->teacher->name}}</p>
        <div class="flex">
            @if ($course->rating!==6)
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                </li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                </li>
            </ul>
            <span class="text-gray-700">{{$course->rating}}</span>
            @endif
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                {{($course->students_count)}}</p>
        </div>
        @if ($course->price==0)
        <p class="my-2 text-gray-400 font-bold"> Gratis</p>    
        @else
        <p class="my-2 text-gray-500 font-bold"> MXN$ {{$course->price}}</p>
        @endif
        <a href="{{route('course.show',$course)}}" class="my-button">
            Más informacion
        </a>
    </div>
</article>