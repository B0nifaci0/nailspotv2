<div>

    <h1 class="mb-2 text-2xl font-semibold uppercase">Estudiantes del curso: <b class="font-serif italic">{{$course->name}}</b></h1>
    <hr class="mt-5 mb-6" />

    <x-table-responsive>

        <div class="px-6 py-4 ">
            <input wire:model="search" type="text" class="flex-1 w-full shadow-sm form-input" placeholder="Buscar ...">
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        Email
                    </th>
                    <th scope="col" 
                        class="relative px-6 py-3 ">
                        opciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="{{$student->profile_photo_url}}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$student->name}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$student->email}}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                        <a href="{{route('instructor.courses.student.tasks',[$course, $student])}}"
                            class="text-indigo-600 hover:text-indigo-900 "><button
                                class="px-4 py-2 font-bold text-white bg-pink-600 rounded hover:bg-pink-700">Ver
                                tareas</button></a>
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
            {{$students->links()}}
        </div>
    </x-table-responsive>

</div>
