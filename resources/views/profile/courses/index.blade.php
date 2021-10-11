<x-profile-layout>
    <h1 class="text-2xl text-center text-gray-900 text-bold">Cursos Adquiridos</h1>
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
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Metodo
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Estatus
                </th>
                <th scope="col"
                    class="px-6 py-3 text-xs font-medium tracking-wider text-center text-gray-500 uppercase">
                    Tareas
                </th>

            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($coursesAdquiried as $sale)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @isset($sale->saleable->image)
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-10 h-10 rounded-full" src="{{$sale->saleable->image->url}}" alt="">
                        </div>
                        @else
                        <img class="w-10 h-10 rounded-full"
                            src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                        @endisset
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                @if ($sale->status==1)
                                <a href="{{route('course.status',$sale->saleable)}}">
                                    {{$sale->saleable->name}}</a>
                                @else
                                {{$sale->saleable->name}}
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$sale->saleable->category->name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{!!$sale->saleable->description!!}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">$ {{$sale->final_price}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{$sale->created_at->format('j F, Y')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{($sale->payment_platform_id==1 ? 'PayPal' : 'OXXO')}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{($sale->status==0 ? 'Pendiente' : 'Aprobado')}}
                </td>
                <td class="pr-8 py-4 text-sm font-medium text-right whitespace-nowrap">
                    <button class="px-2 py-2 w-3/5 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        <a href="{{route('profile.courses.tasks',$sale->saleable)}}" class="text-white">Tareas</a>
                    </button>
                </td>
            </tr>
            @empty
            <tr class="px-6 py-4">
                <td colspan="7">
                    <p class="text-center">
                        No se encontraron resultados para tu busqueda.
                    </p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="px-6 py-4">
        {{$coursesAdquiried->links()}}
    </div>
</x-profile-layout>