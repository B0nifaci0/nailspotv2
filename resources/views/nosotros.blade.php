<x-app-layout>
    @section('css')
    <style>
        .embed-container {
            position:relative;
            padding-bottom: 56.25%;
            height:0;
            overflow: hidden;
        }
        
        .embed-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    @endsection
    @foreach($nosotros as $nosotros)
    @section('header')
    <header class="relative  h-screen overflow-hidden">
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-screen bg-center bg-cover mb-2"
                style='background-image: url("img/todos.jpg");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-purple-500"></span>
            </div>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div class="">
                            <div class="block">
                                <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mb-4 mt-4" id="boton">
                                    <i class="fas fa-play-circle fa-10x"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endsection
    <div class="relative p-2 pt-10 bg-purple-800 md:flex">
        <div class="sm:w-2/2 md:w-3/3 lg:w-4/4 xl:w-4/5  mx-auto">
            <section class="m-4 mt-5 mb-5 card">
                <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                    <div class=" embed-responsive hidden" id="video" >
                        <iframe src="https://www.youtube-nocookie.com/embed/{{$nosotros->video_identify}} " frameborder="0" allowfullscreen > </iframe >
                    </div>
                </div>
            </section>
        </div>
    </div>
    
    <!--<div  id="video" class=" embed-container card-body hidden"  >
                            </div >-->
    <div class="bg-purple-800  overflow-hidden ">
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 mx-auto text-center">
                <h1 class="text-white font-semibold text-6xl inline-block">
                    Acerca de Nosotros
                </h1>
                <p class="mt-4 text-3xl text-white font-bold text-justify">
                    {{$nosotros->about_us}}
                </p><br>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-purple-800">
        <div>
            <h1 class="bg-purple-800 text-white font-bold text-center text-6xl pt-5 pb-5">¿Quienes somos?</h1>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4 ">
            <div class="order-2  ">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl ">
                    <div class="card-body ">
                        <h1 class="text-4xl  font-bold  text-center mb-8 mt-4">Visión</h1>
                            <p class="text-xl text-justify text-white font-bold">{{$nosotros->vision}}</p>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4  rounded-xl">
                    <div class="card-body">
                        <h1 class="font-bold text-4xl text-center mb-8 mt-4">Misión</h1>
                               <p class="text-xl text-justify text-white font-bold"> {{$nosotros->mision}} </ṕ>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4  rounded-xl">
                    <div class="card-body items-justify">
                        <h1 class="font-bold text-4xl text-center mb-8 mt-4">Nustros valores</h1>
                                <p class="text-xl text-justify text-white font-bold">{{$nosotros->valors}} </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="bg-pink-600 pb-8">
        <div>
            <h1 class="bg-pink-600 text-white font-bold text-center text-6xl pt-5 pb-8">Conoce más de nosotros</h1>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4 mx-auto">
            <div class="order-2 ">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl">
                    <div class="card-body rounded-xl  ">
                        <h1 class="font-bold text-3xl text-center"><i class="fas fa-hand-point-up fa-5x mb-12 mt-4 "></i> <br> ¿Que hacemos?</h1> <br>
                            <p class="text-xl font-bold text-justify text-white">{{$nosotros->what_do}}</p>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center"><i class="fas fa-check-double fa-5x mb-12 mt-4 "></i> <br> ¿Como lo hacemos?</h1><br>
                           <p class="text-xl font-bold text-justify text-white"> {{$nosotros->how_do}} </p>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center"><i class="fas fa-palette fa-5x mb-12 mt-4 " ></i> <br> Nuestros Expertos</h1> <br>
                               <p class="text-xl font-bold text-justify text-white">{{$nosotros->own_expert}} </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="bg-purple-800">
        <div>
            <h1 class="bg-purple-800 text-white font-bold text-center text-6xl pt-5 pb-5">Experiencia Nailspot</h1>
            <br>
                   <h1 class="bg-purple-800 text-white font-bold text-center text-xl pt-5 pb-5"> {{$nosotros->exp_nailspot}} </h1>
        </div>
        <div class="grid lg:grid-cols-2 grid grid-cols-1  gap-4">
            <div class="order-2  ">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl">
                    <div class="card-body rounded-xl">
                        <h1 class="text-3xl  font-bold  text-center">Alumnos y competidores</h1>
                        <div class="sm:w-2/2 md:w-5/3 lg:w-4/4 xl:w-5/5 ">
                            <section class="m-4 mt-5 mb-5 card">
                                <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                                    <div class=" embed-responsive">
                                        <iframe  class=" absolute inset-0 w-full h-full " src=" https://www.youtube-nocookie.com/embed/{{$nosotros->video_exp_users}} " frameborder="0" … > </iframe >
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center">Jueces</h1>
                        <div class="sm:w-2/2 md:w-5/3 lg:w-4/4 xl:w-5/5 ">
                            <section class="m-4 mt-5 mb-5 card">
                                <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                                    <div class=" embed-responsive">
                                        <iframe  class=" absolute inset-0 w-full h-full " src=" https://www.youtube-nocookie.com/embed/{{$nosotros->video_exp_judge}}" frameborder="0" … > </iframe >
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div>
            <h1 class="bg-purple-800 text-white font-bold text-center text-6xl pt-5 pb-5">Nuestros fundadores</h1>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4">
            <div class="order-2">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                    <div class="card-body">
                        <article class="bg-indigo-800 flex flex-col ">
                            <img class="w-full" src="{{asset('img/foto_renato.jpg')}}" alt="">
                            <div class="card-body flex-1 flex flex-col ">
                                <h1 class="text-6xl mb-2 text-center text-white font-bold uppercase"> Renato Ortíz </h1>
                                <b class="text-md text-white text-3xl text-center"> {{$nosotros->cargo_renato}}</b>
                                <h2 class="text-md text-white text-3xl text-center"> {{$nosotros->oficio_renato}}</h2>
                                <p class="text-white text-sm mb-2 mt-auto">{{$nosotros->pasatiempo_renato}}</p>
                              <div class="mx-auto">
                                <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/profile.php?id=100009998405727" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/renato_delao/" class="fab fa-instagram"></a>
                                </button>
                              </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                    <div class="card-body">
                        <article class="bg-indigo-800 flex flex-col ">
                            <img class="w-full" src="{{asset('img/foto_yohana.jpg')}}" alt="">
                            <div class="card-body flex-1 flex flex-col ">
                                <h1 class="text-6xl mb-2 text-center text-white font-bold uppercase">Yohana Rivas </h1>
                                <b class="text-md text-white text-3xl text-center"> {{$nosotros->cargo_yohana}}</b>
                                <h2 class="text-md text-white text-3xl text-center"> {{$nosotros->oficio_yohana}}</h2>
                                <p class="text-white text-sm mb-2 mt-auto">{{$nosotros->pasatiempo_yohana}}</p>
                              <div class="mx-auto">
                                <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/y.rivas86" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/nailsyohanaoficial/" class="fab fa-instagram"></a>
                                </button>
                              </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                    <div class="card-body">
                        <article class="bg-indigo-800 flex flex-col ">
                            <img class="w-full" src="{{asset('img/foto_aron.jpg')}}" alt="">
                            <div class="card-body flex-1 flex flex-col ">
                                <h1 class="text-6xl mb-2 text-center text-white font-bold uppercase">Aarón Amaro </h1>
                                <b class="text-md text-white text-3xl text-center">{{$nosotros->cargo_aron}}</b>
                                <h2 class="text-md text-white text-3xl text-center">{{$nosotros->oficio_aron}}</h2>
                                <p class="text-white text-sm mb-2 mt-auto">{{$nosotros->pasatiempo_aron}}</p>
                              <div class="mx-auto">
                                <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/aaronroman.amaro" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/aaron_amaro_nails/" class="fab fa-instagram"></a>
                                </button>
                              </div>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endforeach
            <script>
                const boton = document.querySelector('#boton');
                const menu = document.querySelector('#video');

                boton.addEventListener('click', () => {
                    console.log('Me diste click')
                    menu.classList.toggle('hidden')
                })
                $("#close").click(function() {
  $("#myIframe").css({"display": 'none'});
});
            </script>

</x-app-layout>