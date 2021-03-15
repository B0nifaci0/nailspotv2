<x-app-layout>

    @section('header')
    <div class=" w-full lg:max-w-full lg:flex pt-20 p-2 bg-gray-300 relative">
        <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden bg-center">
            {!!$competence->iframe!!}
        </div>
        <div
            class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-gray-700 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal w-full text-white">
            <div class="mb-8">
                <h1 class="text-4xl">{{$competence->name}}</h1>
                <h2 class="text-xl mb-3">{!!$competence->description!!}</h2>
                <p class="ml-5 mb-3">Nivel: {{$competence->level->name}}</p>
                <p class="ml-5 mb-3">Categoria: {{$competence->subcategory->name}}</p>
                <p class="ml-5 text-white mb-3">Matriculados:
                    <i class="fas fa-users"></i>
                    {{($competence->students_count)}}</p>

            </div>
            <div class="flex items-center mb-6">
                <img class="w-10 h-10 rounded-full mr-4" src="{{$competence->teacher->profile_photo_url}}"
                    alt="Avatar of Writer">
                <div class="text-sm text-white">
                    <p class=" leading-none">{{$competence->teacher->name}}</p>
                    <p class="">Publicado: {{$competence->created_at->format('d-m-Y')}}</p>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden text-gray-300"
            style="height: 70px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="fill-current text-gray-500 hidden 2xl:block" points="2560 0 2560 100 0 101">
                </polygon>
            </svg>
        </div>
    </div>
    @endsection
    <div class="bg-gray-500">
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="order-2 lg:col-span-2 lg:order-1">
                <section class="mb-8">
                    <h1 class="font-bold text-3xl">Descripcion</h1>
                    <div class="text-gray-700 text-base">
                        {!!$competence->description!!}
                    </div>
                </section>
                <section class="card">
                    <div class="card-body">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Autor</h1>
                        <div class="flex items-center text-gray-700">
                            <img src="{{$competence->teacher->profile_photo_url}}" alt="avatar"
                                class="w-12 h-12 object-cover rounded-full shadow-lg mx-4">
                            <div>
                                <h1 class="font-bold mx-1 hover:underline">{{$competence->teacher->name}}</h1>
                                <span class="text-sm font-light">Publicado
                                    {{$competence->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        @can('enrolled',$competence)
                        <a href="{{route('competence.status',$competence)}}" type="submit"
                            class="my-button mt-4">Continuar</a>
                        @else
                        <p class="text-2xl text-gray-500 font-bold mt-3 mb-2"> MXN$ {{$competence->price}}</p>
                        <a href="{{route('payment.competence.checkout', $competence)}}" class="my-button">Participar</a>
                        @endcan
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>