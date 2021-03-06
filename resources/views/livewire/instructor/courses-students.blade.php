<div>

    <h1 class="text-2xl font-bold uppercase mb-2">Estudiantes del curso</h1>
    <hr class="mt-2 mb-6" />

    <x-table-responsive>

        <div class="px-6 py-4 ">
            <input wire:model="search" type="text" class="form-input flex-1 shadow-sm w-full" placeholder="Buscar ...">
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
                        Email
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{$student->profile_photo_url}}">
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

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('instructor.courses.tasks',[$course, $student])}}"
                            class="text-indigo-600 hover:text-indigo-900">Tareas</a>
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