<div class="container py-8">
    <x-table-responsive>

        {{-- <div class="px-6 py-4 flex">
            <input wire:keydown="clearPage" wire:model="search" type="text" class="form-input flex-1 shadow-sm"
                placeholder="Buscar ...">
        </div> --}}
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Criterio
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Evaluar
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($competences as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            @isset($item->competence->image)
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{Storage::url($item->competence->image->url)}}" alt="">
                            </div>
                            @else
                            <img class="h-10 w-10 rounded-full"
                                src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                            @endisset
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$item->competence->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$item->competence->name}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$item->criterion->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('instructor.courses.edit', $item->competence)}}"
                            class="text-indigo-600 hover:text-indigo-900">Ir a calificar</a>
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
            {{$competences->links()}}
        </div>
    </x-table-responsive>
</div>