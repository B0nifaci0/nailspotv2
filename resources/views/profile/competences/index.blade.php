<x-profile-layout>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Competencia
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Descripcion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Precio
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Comprado
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($competences as $competence)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @isset($competence->image)
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{Storage::url($competence->image->url)}}" alt="">
                        </div>
                        @else
                        <img class="h-10 w-10 rounded-full"
                            src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                        @endisset
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{route('competence.status',$competence)}}">
                                    {{$competence->name}}</a>

                            </div>
                            <div class="text-sm text-gray-500">
                                {{$competence->subcategory->name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{!!$competence->description!!}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">$ {{$competence->sales->first()->final_price}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$competence->sales->first()->created_at->format('d-m-Y')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('profile.resources', $competence) }}"> <button class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 rounded">Entregable</button> </a>
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
</x-profile-layout>