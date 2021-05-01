<x-instructor-layout :course="$course">
    <div>
        <h1>Comentarios:</h1>

        @foreach ($course->comments as $comment)
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

</x-instructor-layout>