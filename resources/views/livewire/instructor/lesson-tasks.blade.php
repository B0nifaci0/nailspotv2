<div>
    <h1 class="text-2xl font-bold uppercase mb-2">Lecciones de {{$student->name}}</h1>
    <hr class="mt-2 mb-6" />
    @foreach ($tasks as $item)
    <article class="mt-4 card">
        <div>
            <div class="card-body">
                <div class="flex justify-between">
                    <div>
                        <header>
                            <h1>
                                <i class="far fa-play-circle text-blue-500 mr-1"></i>
                                @if ($item->lesson->final)
                                <strong>Leccion Final:</strong> {{$item->lesson->name}}</h1>
                            @else
                            <strong>Leccion :</strong> {{$item->lesson->name}}</h1>
                            @endif
                        </header>
                    </div>
                    <div>
                        @if ($item->status == 1)
                        <a href='{{route('instructor.task.show',$item)}}'
                            class="bg-yellow-300 font-bold text-black rounded-md p-2"> Pendiente</a>
                        @else
                        <a class="bg-green-600 font-bold text-black rounded-md p-2"
                            href='{{route('instructor.task.show',$item)}}'> Calificación:
                            {{$item->score}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </article>
    @endforeach
</div>