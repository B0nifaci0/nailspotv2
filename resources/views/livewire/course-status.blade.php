<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            {!!$current->iframe!!}
            {!!$current->name!!}
        </div>
        <div class="card">
            <div class="card-body">
                <h1>{{$course->name}}</h1>
                <div class="flex items-center mb-2">
                    <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                        src="{{$course->teacher->profile_photo_url}}" alt="">
                    <p class="text-gray-700 text-sm ml-2">{{$course->teacher->name}}</p>
                </div>
            </div>
        </div>
    </div>

    <section
        class=" container p-5 place-items-center min-h-screen grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($course->lessons as $key=>$lesson)
        <x-lesson-card :lesson="$lesson" :course="$course" :key="$key" />
        @endforeach
    </section>

</div>