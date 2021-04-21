<x-app-layout>

    @section('header')
    <div class="w-full lg:max lg:flex pt-20 p-2 bg-purple-800 relative ">
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-4 ">
            <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden bg-auto">
                <div class="embed-responsive">
                    {!!$competence->iframe!!}
                </div>
            </div>
        </div>
        <div class="card-body flex-1 flex flex-col ">
            <section class="card">
                <div class="p-4 flex-1 flex flex-col">
                <h1 class="text-4xl text-center text-bold">{{$competence->name}}</h1>
                <h2 class=" ml-5 text-xl  ">{!!$competence->description!!}</h2>
                <p class="ml-5 mt-2">Nivel: {{$competence->level->name}}</p>
                <p class="ml-5 mt-2 ">Categoria: {{$competence->subcategory->name}}</p>
                <p class="ml-5 mt-2 font-semibold ">Fecha inicio: {{$competence->start_date}} </p>
                <p class="ml-5 mt-2 font-semibold "> Fecha Fin: {{$competence->end_date}}</p>
                <p class="ml-5 text-gray-700 mt-2 ">Matriculados:
                    <i class="fas fa-users"></i>
                    {{($competence->students_count)}}</p>
                </div>
                <!--<div class="flex items-center ml-5 mb-6">
                    <img class="w-12 h-12 rounded-full mr-4" src="{{$competence->teacher->profile_photo_url}}"
                    alt="Avatar of Writer">
                    <div class="text-sm ">
                    <p class=" leading-none">{{$competence->teacher->name}}</p>
                    <p class="">Publicado: {{$competence->created_at->format('d-m-Y')}} </p>
                </div>-->
            </section>
        </div>
    </div>
    @endsection
    <div class="bg-purple-800 shadow-xl ">
        <div class="grid lg:grid-cols-3 grid grid-cols-1 gap-4">
            <div class="order-2  ">
                <section class="card mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body roundedxl">
                        <h1 class="text-3xl text-gray-700 font-bold mb-3 text-center">Descripción de la competencia</h1>
                        <div class="text-gray-700 text-base">
                                {!!$competence->description!!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2  ">
                <section class="card mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body roundedxl">
                        <h1 class="text-3xl text-gray-700 font-bold mb-3 text-center">Criterios de la competencia</h1>
                        <div class="text-gray-700 text-base">
                                {!!$competence->description!!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="card mb-8 ml-4 mr-4 mt-5">
                    <div class="card-body">
                        <h1 class="mb-4 text-xl font-bold text-center text-gray-700">Autor</h1>
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
                            <p class="text-2xl text-gray-500 font-bold mt-3 mb-2 text-center"> $ {{$competence->price}} MXN</p>
                            <a href="{{route('payment.competence.checkout', $competence)}}" class="my-button">Participar  </a>
                            @endcan
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>