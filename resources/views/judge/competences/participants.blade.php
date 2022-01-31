<x-app-layout>
    <div class="relative pt-40 flex content-center bg-purple-800 items-center justify-center">
        <h1 class="text-4xl text-white font-bold">{{ $subcompetence->name }}</h1>
    </div>
    <div class="bg-purple-800 pt-8 pb-8 px-5">
        <div class="container bg-white rounded card mb-5 ">
            <x-table-responsive>
                <table class="min-w-full divide-y divide-gray-200 mb-5 mt-5">
                    <thead class="bg-gray-100">
                        <tr>
                            <th>#</th>
                            <th>Estatus</th>
                            <th>Nivel</th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @forelse ($participants as $key=>$participant)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $participant->participant_code }}
                                </td>
                                @forelse ($participant->scores as $score)
                                    @if ($score->criterionSubcompetenceUser->criterion->id == $criterion->id && $score->criterionSubcompetenceUser->user->id == auth()->user()->id)
                                        <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>Calificado</td>
                                    @endif
                                @empty
                                    <td class='px-6 py-4 whitespace-nowrap text-sm font-medium'>No entregado</td>
                                @endforelse
                                <td>{{ $participant->level->name }}</td>
                                @if ($participant->images_count > 0)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('judge.competences.show', ['participant' => $participant, 'criterion' => $criterion]) }}"
                                            class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">Ver
                                            trabajo</a>
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
        <div class="relative pt-16 flex content-center items-center justify-center">
        </div>
    </div>
</x-app-layout>
