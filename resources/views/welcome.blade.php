<x-app-layout>
    @section('css')
    <style>
        video {
          width: 100%;
          height: auto;
        }

        @media only screen and (min-width: 600px) {
          .col-s-1 {width: 8.33%;}
          .col-s-2 {width: 16.66%;}
          .col-s-3 {width: 25%;}
          .col-s-4 {width: 33.33%;}
          .col-s-5 {width: 41.66%;}
          .col-s-6 {width: 50%;}
          .col-s-7 {width: 58.33%;}
          .col-s-8 {width: 66.66%;}
          .col-s-9 {width: 75%;}
          .col-s-10 {width: 83.33%;}
          .col-s-11 {width: 91.66%;}
          .col-s-12 {width: 100%;}
        }

        @media only screen and (min-width: 768px) {
          .col-1 {width: 8.33%;}
          .col-2 {width: 16.66%;}
          .col-3 {width: 25%;}
          .col-4 {width: 33.33%;}
          .col-5 {width: 41.66%;}
          .col-6 {width: 50%;}
          .col-7 {width: 58.33%;}
          .col-8 {width: 66.66%;}
          .col-9 {width: 75%;}
          .col-10 {width: 83.33%;}
          .col-11 {width: 91.66%;}
          .col-12 {width: 100%;}
        }
        .btn-play {
        animation-name: parpadeo;
        animation-duration: 2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name:parpadeo;
        -webkit-animation-duration: 2s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
        }

        @-moz-keyframes parpadeo{  
        0% { opacity: 1.0; }
        50% { opacity: 0.5; }
        100% { opacity: 1.0; }
        }

        @-webkit-keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.5; }
        100% { opacity: 1.0; }
        }

        @keyframes parpadeo {  
        0% { opacity: 1.0; }
        50% { opacity: 0.5; }
        100% { opacity: 1.0; }
        }

    </style>
    @endsection
    @section('header')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <header class="relative h-screen overflow-hidden">
        <div class="relative flex items-end content-center pt-16 pb-32 " style="min-height: 78vh;">
            <div class="absolute top-0 w-full h-screen mb-2 bg-center bg-cover"
                style='background-image: url("img/principal-nailspot.png");'>
                <span id="blackOverlay" class="absolute w-full h-full bg-purple-500 opacity-50"></span>
            </div>
            <!--inicia modal-->
            <div class="mx-auto">
                <!-- Modal -->
                <div x-data="{ showModal : false }">
                    <!-- Button -->
                    <button @click="showModal = !showModal" class="relative px-4 py-2 mt-4 mb-4 font-semibold text-gray-900 rounded hover:text-white"><i class=" btn-play fas fa-play-circle fa-5x"></i></button>
                    <!-- Modal Background -->
                    <div x-show="showModal" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center overflow-auto text-gray-500 bg-black bg-opacity-40" x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <!-- Modal -->
                        <div x-show="showModal" class="w-8/12 p-6 mx-10 bg-indigo-800 shadow-2xl rounded-xl xs:w-12/12" @click.away="showModal = false" x-transition:enter="transition ease duration-100 transform" x-transition:enter-start="opacity-0 scale-90 translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease duration-100 transform" x-transition:leave-start="opacity-100 scale-100 translate-y-0" x-transition:leave-end="opacity-0 scale-90 translate-y-1">
                            <div class="">
                                <video  controls id="video-nails">
                                    <source src="{{asset('video/Ns-1.mp4')}}" style="width:100%">
                                    <source src="{{asset('video/Ns-1.mp4')}}" type="video/ogg">
                                </video>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-5 space-x-5 text-right">
                                <button @click="showModal = !showModal" id="close-video" class="px-4 py-2 text-sm font-bold text-gray-500 transition-colors duration-150 ease-linear bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-0 hover:bg-gray-300 focus:bg-indigo-50 focus:text-indigo">Cerrar <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--termina-modal-->
        </div>
    </header>

    <!-- Aqui termina el encabezado -->
    @endsection
    <!-- Aqui comienza la seccion de equipo -->
    <section class="pt-5 pb-5 mx-auto bg-purple-800">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap justify-center mb-24 text-center">
                <div class="w-full px-4 lg:w-6/12">
                    <h2 class="text-4xl font-bold text-white">Nuestro Equipo</h2>
                    <p class="m-4 text-lg leading-relaxed text-white">
                        Lleva tu conocimiento a otro nivel, con nuestro equipo de trabajo.
                    </p>
                </div>
            </div>
            <!-----CODIGO DE PRRUEBA ---
            <div class="antialiased text-gray-900 bg-gray-400 wrapper">
                <div>
                    <img src="{{asset('img/foto_yohana.jpg')}}" alt=" random imgee" class="object-cover object-center w-full rounded-lg shadow-md">    
                    <div class="relative px-4 -mt-16 ">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <div class="flex items-baseline">
                              <span class="inline-block px-2 text-xs font-semibold tracking-wide text-teal-800 uppercase bg-teal-200 rounded-full">
                                New
                              </span>
                                <div class="ml-2 text-xs font-semibold tracking-wider text-gray-600 uppercase">
                                    2 baths  &bull; 3 rooms
                                </div>  
                            </div>
                            <h4 class="mt-1 text-xl font-semibold leading-tight uppercase truncate">A random Title</h4>
 
                            <div class="mt-1">
                              $1800
                              <span class="text-sm text-gray-600">   /wk</span>
                            </div>
                            <div class="mt-4">
                              <span class="font-semibold text-teal-600 text-md">4/5 ratings </span>
                              <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                            </div>  
                        </div>
                    </div>
  
                </div>
            </div>-->
            <!---CARDS DE PRUEBA--->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <div class="order-2">
                    <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 shadow-xl rounded-xl ">
                        <div class="card-body">
                            <article class="flex flex-col bg-indigo-800 ">
                                <img class="w-full" src="{{asset('img/foto_renato.jpg')}}" alt="">
                                <div class="static px-1 -mt-16 ">
                                    <div class="p-6 bg-blue-900 rounded-lg shadow-lg">
                                        <div class="flex flex-col flex-1 card-body ">
                                            <h1 class="mb-2 text-5xl font-bold text-center text-white "> Renato Ortíz </h1>
                                        </div>
                                        <div class="flex flex-col flex-1 card-body ">
                                            <div class="mx-auto">
    
                                                <button
                                                    class="w-8 h-8 mb-1 mr-1 text-white bg-blue-600 rounded-full outline-none focus:outline-none"
                                                    type="button">
                                                    <a href="https://www.facebook.com/profile.php?id=100009998405727" class="fab fa-facebook 3x"></a></button><button
                                                     class="w-8 h-8 mb-1 mr-4 text-white rounded-full outline-none bg-gradient-to-t from-purple-400 to-pink-500 focus:outline-none"
                                                    type="button">
                                                    <a  href="https://www.instagram.com/renato_delao/" class="fab fa-instagram 3x"></a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
                <div class="order-2">
                    <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 shadow-xl rounded-xl ">
                        <div class="card-body">
                            <article class="flex flex-col bg-indigo-800 ">
                                <img class="w-full" src="{{asset('img/foto_yohana.jpg')}}" alt="">
                                <div class="static px-1 -mt-16 ">
                                    <div class="p-6 bg-blue-900 rounded-lg shadow-lg">
                                        <div class="flex flex-col flex-1 card-body">
                                            <h1 class="mb-2 text-5xl font-bold text-center text-white "> Yohana Rivas </h1>
                                        </div>
                                        <div class="flex flex-col flex-1 card-body ">
                                            <div class="mx-auto">
                                                <button
                                                    class="w-8 h-8 mb-1 mr-1 text-white bg-blue-600 rounded-full outline-none focus:outline-none"
                                                    type="button">
                                                    <a href="https://www.facebook.com/y.rivas86" class="fab fa-facebook 3x"></a></button><button
                                                     class="w-8 h-8 mb-1 mr-4 text-white rounded-full outline-none bg-gradient-to-t from-purple-400 to-pink-500 focus:outline-none"
                                                    type="button">
                                                    <a  href="https://www.instagram.com/nailsyohanaoficial/" class="fab fa-instagram 3x"></a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
                <div class="order-2">
                    <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 shadow-xl rounded-xl ">
                        <div class="card-body">
                            <article class="flex flex-col bg-indigo-800 ">
                                <img class="w-full" src="{{asset('img/foto_aron.jpg')}}" alt="">
                                <div class="static px-1 -mt-16 ">
                                    <div class="p-6 bg-blue-900 rounded-lg shadow-lg">
                                        <div class="flex flex-col flex-1 card-body">
                                            <h1 class="mb-2 text-5xl font-bold text-center text-white "> Aaron Amaro </h1>
                                        </div>
                                        <div class="flex flex-col flex-1 card-body ">
                                            <div class="mx-auto">
                                                <button
                                                    class="w-8 h-8 mb-1 mr-1 text-white bg-blue-600 rounded-full outline-none focus:outline-none"
                                                    type="button">
                                                    <a href="https://www.facebook.com/aaronroman.amaro" class="fab fa-facebook 3x"></a></button><button
                                                     class="w-8 h-8 mb-1 mr-4 text-white rounded-full outline-none bg-gradient-to-t from-purple-400 to-pink-500 focus:outline-none"
                                                    type="button">
                                                    <a  href="https://www.instagram.com/aaron_amaro_nails/" class="fab fa-instagram 3x"></a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </section>
                </div>
            </div>
            <!---terminan cards-->
        </div>
    </section>
    <!-- Aqui termina la seccion de equipo -->
    <!-- Esta es la seccion de Nuevos cursos -->
    <section class="relative block pb-20 bg-purple-800">
        <div class="absolute top-0 left-0 right-0 bottom-auto w-full -mt-20 overflow-hidden pointer-events-none"
            style="height: 80px; transform: translateZ(0px)">
            <!--<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-purple-800 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>-->
        </div>
        <div class="container pt-5 mx-auto lg:pt-24 lg:pb-64">
            <div class="flex flex-wrap justify-center text-center">
                <div class="w-full px-4 lg:w-6/12">
                    <h2 class="text-4xl font-semibold text-white">Capacitate con nosotros</h2>
                    <p class="mt-4 mb-4 text-lg leading-relaxed text-indigo-100">
                    Tenemos la opción correcta para ti, escribenos a través de facebook, 
                    instagram o por correo electrónico y te responderemos cuanto antes.
                    </p>
                </div>
            </div>
            <div class="container grid grid-cols-1 mt-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
                @foreach ($courses as $course)
                <x-course-card :course="$course" />
                @endforeach
            </div>
        </div>
    </section>

</x-app-layout>
<script>
    let close=document.getElementById('close-video');
    let play=document.querySelector('.btn-play');
    play.addEventListener('click', function(){
        document.getElementById('video-nails').play();
    });
    close.addEventListener('click', function(){
        document.getElementById('video-nails').pause();
    });
</script>    