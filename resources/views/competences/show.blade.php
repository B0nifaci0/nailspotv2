<x-app-layout>

    @section('header')
    <div class="md:flex pt-10 p-2 bg-purple-800 relative ">
        <div class="sm:w-2/2 md:w-1/3 lg:w-2/4 xl:w-2/5 ">
            <section class="bg-indigo-800 mt-5 mb-5 m-4">
                <div class="flex-none bg-cover rounded-t  rounded text-center overflow-hidden bg-center">
                    <div class="embed-responsive">
                        {!!$competence->iframe!!}
                    </div>
                </div>
            </section>
        </div>
        <div class="sm:w-2/2 md:w-2/3 lg:w-2/4 xl:w-3/5  ">
            <section class="bg-indigo-800 mt-5 mb-5 ml-4 mr-4 text-white">
                <div class="p-4 flex-1 flex flex-col">
                <h1 class="text-5xl text-center text-bold">{{$competence->name}}</h1>
                <h2 class=" ml-5 text-xl mb-3 ">{!!$competence->description!!}</h2>
                <p class="ml-5 mt-2">Nivel: {{$competence->level->name}}</p>
                <p class="ml-5 mt-2 ">Categoria: {{$competence->subcategory->name}}</p>
                <p class="ml-5 mt-2 font-semibold ">Fecha inicio: {{$competence->start_date}} </p>
                <p class="ml-5 mt-2 font-semibold "> Fecha Fin: {{$competence->end_date}}</p>
                <p class="ml-5  mt-2 ">Matriculados:
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
                <section class="text-white bg-indigo-800 mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body roundedxl">
                        <h1 class="text-3xl  font-bold mb-3 text-center">Descripción de la competencia</h1>
                        <div class=" text-base">
                                {!!$competence->description!!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2  ">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body roundedxl">
                        <h1 class="text-3xl  font-bold mb-3 text-center">Criterios de la competencia</h1>
                        <div class=" text-base">
                                {!!$competence->description!!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="bg-indigo-800 text-white mb-8 ml-4 mr-4 mt-5">
                    <div class="card-body">
                        <h1 class="mb-4 text-xl font-bold text-center ">Autor</h1>
                            <div class="flex items-center ">
                                <img src="{{$competence->teacher->profile_photo_url}}" alt="avatar"
                                    class="w-12 h-12 object-cover rounded-full shadow-lg mx-4">
                                <div>
                                    <h1 class="font-bold mx-1 hover:underline">{{$competence->teacher->name}}</h1>
                                    <span class="text-sm font-light">Publicado
                                        {{$competence->created_at->format('d-m-Y')}}</span>
                                </div>
                            </div>
                            @can('enrolled',$competence)
                            <a href="{{route('profile.competences')}}" type="submit"
                                class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 block text-center w-full mt-4 rounded-xl">Continuar</a>
                            @else
                            <p class="text-2xl text-white font-bold mt-3 mb-2 text-center"> $ {{$competence->price}} MXN</p>
                            <a href="{{route('payment.competence.checkout', $competence)}}" class="bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 block text-center w-full mt-4 rounded-xl">Participar  </a>
                            @endcan
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>