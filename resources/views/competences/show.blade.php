<x-app-layout>

    @section('header')
        <div class="relative p-2 pt-10 bg-purple-800 md:flex ">
            <div class="sm:w-2/2 md:w-1/3 lg:w-2/4 xl:w-2/5 ">
                <section class="m-4 mt-5 mb-5 bg-indigo-800">
                    <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                        <div class="embed-responsive">
                            {!! $competence->iframe !!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="sm:w-2/2 md:w-2/3 lg:w-2/4 xl:w-3/5">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="flex flex-col flex-1 p-4">
                        <h1 class="text-5xl text-center text-bold">{{ $competence->name }}</h1>
                        <h2 class="mb-3 ml-5 text-xl break-words">{!! $competence->description !!}</h2>

                        <p class="mt-2 ml-5 font-semibold ">Fecha inicio: {{ $competence->start_date }} </p>
                        <p class="mt-2 ml-5 font-semibold "> Fecha Fin: {{ $competence->end_date }}</p>
                        <p class="mt-2 ml-5 ">Matriculados:
                            <i class="fas fa-users"></i>
                            {{ $competence->students_count }}
                        </p>
                    </div>
                </section>
            </div>
        </div>
    @endsection
    <div class="bg-purple-800 shadow-xl">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <div class="order-2 ">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="card-body roundedxl">
                        <h1 class="mb-3 text-3xl font-bold text-center">Categorías</h1>
                        <div class="text-base ">
                            @foreach ($competence->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2 ">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="card-body roundedxl">
                        <h1 class="mb-3 text-3xl font-bold text-center">Subcompetencias</h1>
                        <div class="text-base ">
                            @foreach ($competence->subcompetences as $subcompetence)
                                <ul>
                                    <li class="font-bold">{{ $subcompetence->name }}</li>
                                </ul>
                                @foreach ($subcompetence->levels as $level)
                                    <li>{{ $level->name }}</li>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-8 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="card-body">
                        <h1 class="mb-4 text-xl font-bold text-center ">Autor</h1>
                        <div class="flex items-center ">
                            <img src="{{ $competence->teacher->profile_photo_url }}" alt="avatar"
                                class="object-cover w-12 h-12 mx-4 rounded-full shadow-lg">
                            <div>
                                <h1 class="mx-1 font-bold hover:underline">{{ $competence->teacher->name }}</h1>
                                <span class="text-sm font-light">Publicado
                                    {{ $competence->created_at->format('d-m-Y') }}</span>
                            </div>
                        </div>
                        @can('enrolled', $competence)
                            <a href="{{ route('profile.competences') }}" type="submit"
                                class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl">Continuar</a>
                        @else
                            <a href="{{ route('payment.checkout',["competence", $competence->id] ) }}"
                                class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl">
                                Participar</a>
                        @endcan
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>
