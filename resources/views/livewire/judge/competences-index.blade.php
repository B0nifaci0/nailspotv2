<div class="relative flex items-center content-center justify-center pt-16 bg-purple-800">
</div>
<div class="bg-purple-800">
    <!-- En esta seccion se nos muestra un listado de criterios asignados a cada juez -->
    <h1 class="pt-12 pb-6 text-3xl font-bold text-center text-white bg-purple-800">Lista de Criterios</h1>
</div>
<div class="pt-8 pb-12 bg-purple-800">
    <div class="container bg-white rounded ">
        <x-table-responsive>

            <table class="min-w-full divide-y divide-gray-200 ">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nombre
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Criterio
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($competences as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @isset($item->competence->image)
                                        <div class="flex-shrink-0 w-10 h-10">
                                            <img class="w-10 h-10 rounded-full" src="{{ $item->competence->image->url }}"
                                                alt="">
                                        </div>
                                    @else
                                        <img class="w-10 h-10 rounded-full"
                                            src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg"
                                            alt="">
                                    @endisset
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $item->competence->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $item->competence->subcategory->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $item->criterion->name }}
                            </td>
                            <!-- Con este boton podemos ir a calificar la competencia -->
                            <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                <a href="{{ route('judge.competences.participants', ['competence' => $item->competence, 'criterion' => $item->criterion]) }}"
                                    class="text-indigo-600 hover:text-indigo-900"><button
                                        class="px-4 py-2 font-bold text-white bg-pink-600 rounded hover:bg-pink-700">Ir
                                        a calificar</button></a>
                            </td>
                            <!-- Aqui termina el boton para calificar la competencia -->
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
        </x-table-responsive>
        <div class="relative flex items-center content-center justify-center pt-16">
        </div>
    </div>
    <div class="relative flex items-center content-center justify-center pt-16">
    </div>
    <div class="relative flex items-center content-center justify-center pt-16">
    </div>
</div>
<!-- Aqui termina la seccion de los criterios asiganados por competencia -->
