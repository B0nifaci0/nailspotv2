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
    @section('header')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <header class="relative  h-screen overflow-hidden">
        <div class="relative pt-16 pb-32 flex content-center items-end " style="min-height: 75vh;">
            <div class="absolute top-0 w-full h-screen bg-center bg-cover mb-2"
                style='background-image: url("img/todos.jpg");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-purple-500"></span>
            </div>
    @foreach($nosotros as $nosotros)
            <!--inicia modal-->
            <div class="mx-auto">
                <!-- Modal -->
                <div x-data="{ showModal : false }">
                    <!-- Button -->
                    <button @click="showModal = !showModal" class="relative  bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded mb-4 mt-4"><i class="fas fa-play-circle fa-5x"></i></button>
                    <!-- Modal Background -->
                    <div x-show="showModal" class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <!-- Modal -->
                        <div x-show="showModal" class="bg-indigo-800 rounded-xl shadow-2xl p-6 xs:w-12/12 w-8/12 mx-10" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div class=" embed-responsive">
                                <iframe  class=" relative inset-0  " src=" https://www.youtube-nocookie.com/embed/{{$nosotros->url}} " frameborder="0" … > </iframe >
                            </div>

                            <!-- Buttons -->
                            <div class="text-right space-x-5 mt-5">
                                <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-50 focus:bg-indigo-50 focus:text-indigo">Cerrar <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina-modal-->
        </div>
    </header>
    @endsection
    <div class="bg-gradient-to-b from-pink-600  to-purple-800  overflow-hidden ">
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
    <div class="bg-purple-800 pb-8">
        <div>
            <h1 class="bg-purple-800 text-white font-bold text-center text-6xl pt-5 pb-8">Conoce más de nosotros</h1>
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
                                        <iframe  class=" absolute inset-0 w-full h-full " src=" https://www.youtube-nocookie.com/embed/{{$nosotros->url_users}} " frameborder="0" … > </iframe >
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
                                        <iframe  class=" absolute inset-0 w-full h-full " src=" https://www.youtube-nocookie.com/embed/{{$nosotros->url_judge}}" frameborder="0" … > </iframe >
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