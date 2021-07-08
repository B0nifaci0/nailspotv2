<div><br>
    <h1>Comentarios:</h1>
    <textarea wire:model="body" rows="3" class="w-full form-input" placeholder="Escribe un comentario..."></textarea>
    @error('body')
    <span class="text-red-500 text-sx">{{$message}}</span>
    @enderror
    <button class="px-4 py-2 m-2 text-white bg-blue-500 rounded " wire:click="store">Comentar</button>

    @foreach ($taskUser->comments as $comment)
    <article class="flex mb-4 text-gray-800">
        <figure class="mr-4">
            <img class="object-cover w-12 h-12 rounded-full shadow-lg" src="{{$comment->user->profile_photo_url}}"
                alt="">
        </figure>

        <div class="flex-1 card">
            <div class="bg-gray-100 card-body">
                <p><b>{{$comment->user->name}}</b></p>
                {{$comment->body}}
            </div>
        </div>
    </article>
    @endforeach
</div>