<section>
    <h1 class="text-2xl font-bold uppercase">
        Tareas de {{$student->name}}
    </h1>
    <hr class="mt-2 mb-6" />
    <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
        <thead class="text-white bg-green-400">
            @foreach($tasks as $value)
            <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                <th class="p-3 text-left">Estatus</th>
                <th class="p-3 text-left">Calificación</th>
                <th class="p-3 text-left" width="110px">Revisar</th>
            </tr>
            @endforeach
        </thead>
        <tbody class="flex-1 sm:flex-none">
            @foreach ($tasks as $task)
            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                <td class="border-grey-light border hover:bg-gray-100 p-3">{{$task->status}}</td>
                <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{($task->score) ?
                        $task->score : 'No calificado'}}</td>
                <td
                    class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                    Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>