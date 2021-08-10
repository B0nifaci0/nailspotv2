<div class="bg-purple-800 pt-8 pb-48">
    <div class="container bg-white rounded">
        <x-table-responsive>
        
            <div class="px-6 py-4 flex">
                <input wire:keydown="clearPage" wire:model="search" type="text" class="form-input flex-1 shadow-sm"
                    placeholder="Buscar ...">
                <a href="{{route('instructor.courses.create')}}"
                    class="block text-center bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded ml-2">Crear nuevo curso</a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificacion
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estatus
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                               @isset($course->image)
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="{{Storage::url($course->image->url)}}" alt="">
                                </div>
                                @else
                                <img class="h-10 w-10 rounded-full"
                                    src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                                @endisset


                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{$course->name}}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{$course->category->name}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 flex items-center">
                                @if ($course->rating!==6)
                                <span class="text-gray-700">{{$course->rating}}</span>
                                <ul class="flex text-sm ml-2">
                                    <li class="mr-1"><i
                                            class="fas fa-star text-{{$course->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1"><i
                                            class="fas fa-star text-{{$course->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1"><i
                                            class="fas fa-star text-{{$course->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1"><i
                                            class="fas fa-star text-{{$course->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                    <li class="mr-1"><i
                                            class="fas fa-star text-{{$course->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                                    </li>
                                </ul>
                                @else
                                <span class="text-gray-700">No ha sido valorado.</span>
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">Valoracion</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">

                            @switch($course->status)
                            @case(1)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Borrador
                            </span>
                            @break
                            @case(2)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                En revisión
                            </span>
                            @break
                            @case(3)
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Publicado
                            </span>
                            @break
                            @default
                            @endswitch

                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('instructor.courses.tasks', $course)}}"
                            ><button  class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Agregar tareas</button></a>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{route('instructor.courses.edit', $course)}}"
                            ><button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ver más</button></a>
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
        </x-table-responsive>
    </div>
</div>