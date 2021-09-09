<x-profile-layout>
    <h1 class="text-2xl text-center text-gray-900 text-bold">Cusos Adquiridos</h1>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Curso
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Comprado
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($courses as $course)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @isset($course->image)
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="{{$course->image->url}}" alt="">
                        </div>
                        @else
                        <img class="w-10 h-10 rounded-full"
                            src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                        @endisset
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{route('course.status',$course)}}">
                                    {{$course->name}}</a>

                            </div>
                            <div class="text-sm text-gray-500">
                                {{$course->category->name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{!!$course->description!!}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">$ {{$course->sales->first()->final_price}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$course->sales->first()->created_at->format('j F, Y')}}
                </td>
             
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        <a href="{{route('profile.courses.tasks',$course)}}" class="text-white">Tareas</a>
                    </button>
                </td>
            </tr>
            @empty
            <tr class="px-6 py-4">
                <td colspan="5">
                    <p class="text-center">
                        No se encontraron resultados para tu busqueda.
                    </p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="px-6 py-4">
        {{$courses->links()}}
    </div>
</x-profile-layout>