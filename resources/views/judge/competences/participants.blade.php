<x-app-layout>
    <div class="relative pt-16 flex content-center items-center justify-center">
    </div>
    <div class="container py-8">
        <x-table-responsive>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th>#</th>
                        <th>Estatus</th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-center">
                    @forelse ($participants as $key=>$participant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{$key+1}}
                        </td>
                        @forelse ($participant->scores as $score)
                        @if ($score->competenceCriterionUser->criterion->id == $criterion->id &&
                        $score->competenceCriterionUser->user->id == auth()->user()->id)
                        <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>Calificado</td>
                        @endif
                        @empty
                        <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>No entregado</td>
                        @endforelse
                        @if ($participant->images_count >0)
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{route('judge.competences.show', ['participant'=>$participant, 'criterion'=> $criterion])}}"
                                class="text-indigo-600 hover:text-indigo-900">Ver trabajo</a>
                        </td>
                        @endif
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
    </div>
</x-app-layout>