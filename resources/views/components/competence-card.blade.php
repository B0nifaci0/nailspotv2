@props(['competence'])

<article class="flex flex-col bg-indigo-800 hover:shadow-xl ">
    <img class="w-full " src="{{$competence->image->url}}" alt="">
    <div class="flex flex-col flex-1 text-white card-body">
        <h1 class="mb-2 text-2xl text-center"> {{$competence->name}}</h1>
        <p class="text-md"> {!!Str::limit($competence->description,50)!!}</p>
        <p class="mt-auto mb-2 text-sm ">Prof. {{$competence->teacher->name}}</p>
        <p class="mt-auto mb-2 text-sm ">Inicia {{$competence->start_date}}</p>
        @if ($competence->price==0)
        <p class="my-2 font-bold"> Gratis</p>
        @else
        <p class="my-2 text-3xl font-bold text-center"> $ {{$competence->price}} MXN</p>
        @endif

        <a href="{{route('competence.show', $competence)}}"
            class="my-2 text-xl text-center text-white rounded my-button bg-gradient-to-r from-purple-400 to-pink-400 ">Más
            información</a>

    </div>
</article>