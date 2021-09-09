@props(['course'])

<article class="flex flex-col bg-indigo-800 ">
    <img class="w-full" src="{{$course->image->url}}" alt="">
    <div class="flex flex-col flex-1 card-body ">
        <h1 class="mb-2 text-2xl text-center text-white"> {{$course->name}}</h1>
        <h2 class="text-white text-md"> {!!Str::limit($course->description,50)!!}</h2>
        <p class="mt-auto mb-2 text-sm text-white">Prof. {{$course->teacher->name}}</p>
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
            <span class="text-white">{{$course->rating}}</span>
            @endif
            <p class="ml-auto text-sm text-white">
                <i class="fas fa-users"></i>
                {{($course->students_count)}}</p>
        </div>
        @if ($course->price==0)
        <p class="my-2 font-bold text-white"> Gratis</p>
        @else
        <p class="mx-auto my-2 text-2xl font-bold text-white"> $ {{$course->price}} MXN</p>
        @endif
        <a href="{{route('course.show',$course)}}"
            class="my-2 text-xl text-center text-white rounded bg-gradient-to-r from-purple-400 to-pink-400 ">
            Más información
        </a>
    </div>
</article>