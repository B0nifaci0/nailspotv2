<x-app-layout>

    <div class="card mt-5">
        <div class="card-body mt-5">
            @foreach ($competences as $competence)
            {{$competence}}
            <br>
            <br>
            <br>
            @endforeach
        </div>
    </div>
</x-app-layout>