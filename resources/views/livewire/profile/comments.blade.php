<div>
    <h1>Comentarios:</h1>
    <textarea wire:model="comment" rows="3" class="form-input w-full" placeholder="Comentario..."></textarea>
    <button class="py-2 bg-blue-500 text-white rounded m-2 px-4 " wire:click="store">Comentar</button>

    @foreach ($task->comments as $comment)
    <article class="flex mb-4 text-gray-800">
        <figure class="mr-4">
            <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$comment->user->profile_photo_url}}"
                alt="">
        </figure>

        <div class="card flex-1">
            <div class="card-body bg-gray-100">
                <p><b>{{$comment->user->name}}</b></p>
                {{$comment->body}}
            </div>
        </div>
    </article>
    @endforeach
</div>