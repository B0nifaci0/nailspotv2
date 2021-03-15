@props(['competence'])

<article class="card flex flex-col">
    <img class="h-41 sm:h-36 w-full object-cover" src="{{Storage::url($competence->image->url)}}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="text-xl mb-2"> {{$competence->name}}</h1>
        <p class="text-sm"> {!!Str::limit($competence->description,50)!!}</p>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof. {{$competence->teacher->name}}</p>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Inicia {{$competence->start_date}}</p>
        @if ($competence->price==0)
        <p class="my-2 text-gray-400 font-bold"> Gratis</p>
        @else
        <p class="my-2 text-gray-500 font-bold"> MXN$ {{$competence->price}}</p>
        @endif

        <a href="{{route('competence.show', $competence)}}" class="my-button">Información</a>

    </div>
</article>