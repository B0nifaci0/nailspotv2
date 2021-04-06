@props(['competence'])

<article class="card flex flex-col hover:shadow-xl transform hover:scale-105">
    <img class="h-41 sm:h-36 w-full object-cover" src="{{Storage::url($competence->image->url)}}" alt="">
    <div class="card-body flex-1 flex flex-col">
        <h1 class="text-2xl mb-2 text-center"> {{$competence->name}}</h1>
        <p class="text-md"> {!!Str::limit($competence->description,50)!!}</p>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof. {{$competence->teacher->name}}</p>
        <p class="text-gray-500 text-sm mb-2 mt-auto">Inicia {{$competence->start_date}}</p>
        @if ($competence->price==0)
        <p class="my-2 text-gray-400 font-bold"> Gratis</p>
        @else
        <p class="text-2xl my-2 text-gray-500 font-bold"> $ {{$competence->price}} MXN</p>
        @endif

        <a href="{{route('competence.show', $competence)}}" class="my-button
        bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2 ">Información</a>

    </div>
</article> 