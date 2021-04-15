@props(['course'])

<div class="container mx-auto bg-white rounded-xl">
        <div clas="relative pb-48 mt-5 mb-4">
            <img class="h-41 sm:h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
        </div>
    <div class="flex flex-wrap mx-4">
        <div class="flex flex-wrap mx-auto">
            <h1 class="p-4 text-2xl mb-4 text-center font-bold"> {{$course->name}}</h1>
            <p class="text-md"> {!!Str::limit($course->description,50)!!}</p><br>
            <p class="mt-2 mb-2  font-bold">Prof. {{$course->teacher->name}}</p><br>
            <div class="p-4 border-t flex mx-auto text-sm text-gray-600">
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

            </div>
            <div class="p-4 border-t flex mx-auto text-sm text-gray-600">
                <span class="text-gray-700"> 
                    <i class="fas fa-users"></i>
                        {{($course->students_count)}}
                    </span>
                </div>
            <div class="p-4 border-t  border-b mt-3 flex mx-auto ">
                <span class="text-sm font-semibold">
                    @if ($course->price==0)
                    <span class="font-bold text-xl "> Gratis</span>
                    @else
                    <p class="font-bold text-2xl "> $ {{$course->price}} MXN</p>
                    @endif
                </span>
            </div>
            <a href="{{route('course.show',$course)}}" 
             class="block text-center w-full mt-4 bg-pink-600 text-white mb-4 font-bold py-2 mx-auto rounded-xl ">
                Más información
            </a>
        </div>
    </div>
</div>