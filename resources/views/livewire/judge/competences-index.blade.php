<div class="relative pt-16 flex content-center items-center justify-center bg-purple-800"> 
            </div>
<div class="bg-purple-800">
<!-- En esta seccion se nos muestra un listado de criterios asignados a cada juez -->
    <h1 class="text-center text-white text-3xl font-bold pt-12 pb-6 bg-purple-800">Lista de Criterios</h1>
</div>
<div class="bg-purple-800 pt-8 pb-12">
    <div class="container  bg-white rounded ">
        <x-table-responsive>

            <table class="min-w-full divide-y divide-gray-200 ">
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
                                        {{$item->competence->subcategory->name}}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$item->criterion->name}}
                        </td>
                        <!-- Con este boton podemos ir a calificar la competencia -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{route('judge.competences.participants',['competence'=> $item->competence, 'criterion' => $item->criterion])}}"
                                class="text-indigo-600 hover:text-indigo-900"><button class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Ir a calificar</button></a>
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
        <div class="relative pt-16 flex content-center items-center justify-center"> 
            </div>
    </div>
    <div class="relative pt-16 flex content-center items-center justify-center"> 
            </div>
            <div class="relative pt-16 flex content-center items-center justify-center"> 
            </div>
</div>
<!-- Aqui termina la seccion de los criterios asiganados por competencia -->