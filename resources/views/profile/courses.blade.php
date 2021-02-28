<x-profile-layout>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Curso
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
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($details as $detail)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @isset($detail->course->image)
                        <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{Storage::url($detail->course->image->url)}}"
                                alt="">
                        </div>
                        @else
                        <img class="h-10 w-10 rounded-full"
                            src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg" alt="">
                        @endisset
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                <a href="{{route('course.status',$detail->course)}}">
                                    {{$detail->course->name}}</a>

                            </div>
                            <div class="text-sm text-gray-500">
                                {{$detail->course->category->name}}
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$detail->course->description}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">${{$detail->final_price}}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="block rounded-t overflow-hidden bg-white text-center w-24">
                            <div class="bg-red-600 text-white py-1">
                                Feb
                            </div>
                            <div class="pt-1 border-l border-r">
                                <span class="text-4xl font-bold">{{$detail->created_at->format('d')}}</span>
                            </div>
                            <div class="pb-2 px-2 border-l border-r border-b rounded-b flex justify-between">
                                <span class="text-xs font-bold">{{$detail->created_at->format('D')}}</span>
                                <span class="text-xs font-bold">{{$detail->created_at->format('Y')}}</span>
                            </div>
                        </div>
                    </div>
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
        {{$details->links()}}
    </div>
</x-profile-layout>