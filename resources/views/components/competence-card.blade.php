@props(['competence'])

<article class="bg-indigo-800 flex flex-col hover:shadow-xl ">
    <img class="w-full " src="{{Storage::url($competence->image->url)}}" alt="">
    <div class="card-body flex-1 flex flex-col text-white">
        <h1 class="text-2xl mb-2 text-center"> {{$competence->name}}</h1>
        <p class="text-md"> {!!Str::limit($competence->description,50)!!}</p>
        <p class=" text-sm mb-2 mt-auto">Prof. {{$competence->teacher->name}}</p>
        <p class=" text-sm mb-2 mt-auto">Inicia {{$competence->start_date}}</p>
        @if ($competence->price==0)
        <p class="my-2  font-bold"> Gratis</p>
        @else
        <p class="text-3xl text-center my-2  font-bold"> $ {{$competence->price}} MXN</p>
        @endif

        <a href="{{route('competence.show', $competence)}}" class="my-button
        bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2 ">Más información</a>

    </div>
</article> 