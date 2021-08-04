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




    </style>
    @endsection
    @section('header')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <header class="relative  h-screen overflow-hidden">
        <div class="relative pt-16 pb-32 flex content-center items-end " style="min-height: 78vh;">
            <div class="absolute top-0 w-full h-screen bg-center bg-cover mb-2"
                style='background-image: url("img/principal-nailspot.png");'>
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-purple-500"></span>
            </div>
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
                                <iframe  class=" relative inset-0  " src="{{asset('video/Ns-1.mp4')}}" frameborder="0" … > </iframe >
                            </div>

                            <!-- Buttons -->
                            <div class="text-right space-x-5 mt-5">
                                <button @click="showModal = !showModal" class="px-4 py-2 text-sm bg-white rounded-xl border transition-colors duration-150 ease-linear border-gray-200 text-gray-500 focus:outline-none focus:ring-0 font-bold hover:bg-gray-300 focus:bg-indigo-50 focus:text-indigo">Cerrar <i class="fas fa-times"></i></button>
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
    <section class="pt-5 pb-5 bg-purple-800 mx-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-bold text-white">Nuestro Equipo</h2>
                    <p class="text-lg leading-relaxed m-4 text-white">
                        Lleva tu conocimiento a otro nivel, con nuestro equipo de trabajo.
                    </p>
                </div>
            </div>
            <!-----CODIGO DE PRRUEBA ---
            <div class="wrapper bg-gray-400 antialiased text-gray-900">
                <div>
                    <img src="{{asset('img/foto_yohana.jpg')}}" alt=" random imgee" class="w-full object-cover object-center rounded-lg shadow-md">    
                    <div class="relative px-4 -mt-16  ">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-baseline">
                              <span class="bg-teal-200 text-teal-800 text-xs px-2 inline-block rounded-full  uppercase font-semibold tracking-wide">
                                New
                              </span>
                                <div class="ml-2 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                                    2 baths  &bull; 3 rooms
                                </div>  
                            </div>
                            <h4 class="mt-1 text-xl font-semibold uppercase leading-tight truncate">A random Title</h4>
 
                            <div class="mt-1">
                              $1800
                              <span class="text-gray-600 text-sm">   /wk</span>
                            </div>
                            <div class="mt-4">
                              <span class="text-teal-600 text-md font-semibold">4/5 ratings </span>
                              <span class="text-sm text-gray-600">(based on 234 ratings)</span>
                            </div>  
                        </div>
                    </div>
  
                </div>
            </div>-->
            <!---CARDS DE PRUEBA--->
            <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4">
                <div class="order-2">
                    <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                        <div class="card-body">
                            <article class="bg-indigo-800 flex flex-col ">
                                <img class="w-full" src="{{asset('img/foto_renato.jpg')}}" alt="">
                                <div class="static px-1 -mt-16  ">
                                    <div class="bg-blue-900 p-6 rounded-lg shadow-lg">
                                        <div class="card-body flex-1 flex flex-col ">
                                            <h1 class="text-5xl mb-2 text-center text-white font-bold "> Renato Ortíz </h1>
                                        </div>
                                        <div class="card-body flex-1 flex flex-col ">
                                            <div class="mx-auto">
    
                                                <button
                                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button">
                                                    <a href="https://www.facebook.com/profile.php?id=100009998405727" class="fab fa-facebook 3x"></a></button><button
                                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
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
                    <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                        <div class="card-body">
                            <article class="bg-indigo-800 flex flex-col ">
                                <img class="w-full" src="{{asset('img/foto_yohana.jpg')}}" alt="">
                                <div class="static px-1 -mt-16  ">
                                    <div class="bg-blue-900 p-6 rounded-lg shadow-lg">
                                        <div class="card-body flex-1 flex flex-col">
                                            <h1 class="text-5xl mb-2 text-center text-white font-bold "> Yohana Rivas </h1>
                                        </div>
                                        <div class="card-body flex-1 flex flex-col ">
                                            <div class="mx-auto">
                                                <button
                                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button">
                                                    <a href="https://www.facebook.com/y.rivas86" class="fab fa-facebook 3x"></a></button><button
                                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
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
                    <section class="bg-indigo-800 text-white mt-5 mb-5 ml-4 mr-4 rounded-xl shadow-xl ">
                        <div class="card-body">
                            <article class="bg-indigo-800 flex flex-col ">
                                <img class="w-full" src="{{asset('img/foto_aron.jpg')}}" alt="">
                                <div class="static  px-1 -mt-16  ">
                                    <div class="bg-blue-900 p-6 rounded-lg shadow-lg">
                                        <div class="card-body flex-1 flex flex-col">
                                            <h1 class="text-5xl mb-2 text-center text-white font-bold "> Aaron Amaro </h1>
                                        </div>
                                        <div class="card-body flex-1 flex flex-col ">
                                            <div class="mx-auto">
                                                <button
                                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                                    type="button">
                                                    <a href="https://www.facebook.com/aaronroman.amaro" class="fab fa-facebook 3x"></a></button><button
                                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-4 mb-1"
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
    <section class="pb-20 relative block bg-purple-800">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px)">
            <!--<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-purple-800 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>-->
        </div>
        <div class="container mx-auto pt-5 lg:pt-24 lg:pb-64">
            <div class="flex flex-wrap text-center justify-center">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold text-white">Capacitate con nosotros</h2>
                    <p class="text-lg leading-relaxed mt-4 mb-4 text-indigo-100">
                    Tenemos la opción correcta para ti, escribenos a través de facebook, 
                    instagram o por correo electrónico y te responderemos cuanto antes.
                    </p>
                </div>
            </div>
            <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-6">
                @foreach ($courses as $course)
                <x-course-card :course="$course" />
                @endforeach
            </div>
        </div>
    </section>
    <!-- Aqui termina la seccion cursos nuevos -->

    {{-- <section class="mt-24">
        <div class="container py-36">
            <h1 class="text-gray-600 text-center text-3xl">Cursos</h1>
            <p class="text-center text-dark mt-2">Dirigete al catalogo de cursos</p>
            <div class="flex justify-center mt-4">
                <a href="{{route('courses.index')}}"
    class="bg-blue-500 hover:bg-blue-light text-white font-bold py-2 px-4 border-b-4 border-blue-dark hover:border-blue
    rounded">
    Button
    </a>
    </div>
    </div>
    </section> --}}

    {{-- <section class="my-24">
        <h1 class="text-gray-600 text-center text-3xl">Ultimos cursos agregados</h1>
        <p class="text-black text-center text-lg mt-2">Tenemos la opción correcta para ti, escribenos a través de
            facebook,
            instagram o por correo electrónico y te responderemos cuanto antes. </p>

        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-6">
            @foreach ($courses as $course)
            <x-course-card :course="$course" />
            @endforeach
        </div>
    </section> --}}



</x-app-layout>