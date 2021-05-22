@props(['course'])

<article class="bg-indigo-800 flex flex-col ">
    <img class="w-full" src="{{Storage::url($course->image->url)}}" alt="">
    <div class="card-body flex-1 flex flex-col ">
        <h1 class="text-2xl mb-2 text-center text-white"> {{$course->name}}</h1>
        <h2 class="text-md text-white"> {!!Str::limit($course->description,50)!!}</h2>
        <p class="text-white text-sm mb-2 mt-auto">Prof. {{$course->teacher->name}}</p>
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
            <p class="text-sm text-white ml-auto">
                <i class="fas fa-users"></i>
                {{($course->students_count)}}</p>
        </div>
        @if ($course->price==0)
        <p class="my-2 text-white font-bold"> Gratis</p>
        @else
        <p class="text-2xl mx-auto my-2 text-white font-bold"> $ {{$course->price}} MXN</p>
        @endif
        <a href="{{route('course.show',$course)}}" 
        class="bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2  ">
            Más información
        </a>
    </div>
</article>