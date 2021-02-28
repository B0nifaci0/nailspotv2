<x-app-layout>

    <div class="card mt-5">
        <div class="card-body mt-5">
            @foreach ($details as $detail)
                {{$detail->course->name}}
                <br>
                <br>
                <br>
            @endforeach
        </div>
    </div>
</x-app-layout>