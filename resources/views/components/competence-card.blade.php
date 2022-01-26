@props(['competence'])

<article class="bg-indigo-800 hover:shadow-xl ">
    @if ($competence->image)
        <img class="w-full" src="{{ $competence->image->url }}" alt="">
    @endif
    <div class="text-white card-body overflow-hidden">
        <h1 class="mb-2 text-2xl text-center"> {{ $competence->name }}</h1>
        <p class="text-md truncate"> {!! Str::limit($competence->description, 50, '...') !!}</p>
        <p class="mt-auto mb-2 text-sm ">Prof. {{ $competence->teacher->name }}</p>
        <p class="mt-auto mb-2 text-sm ">Inicia {{ $competence->start_date }}</p>

        <a href="{{ route('competence.show', $competence) }}"
            class="my-2 text-xl text-center text-white rounded my-button bg-gradient-to-r from-purple-400 to-pink-400 ">Más
            información</a>

    </div>
</article>
