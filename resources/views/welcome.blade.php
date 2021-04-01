<x-app-layout>
    @section('header')
    <header class="relative flex md:justify-start sm:justify-center items-center h-screen overflow-hidden">
        <div class="md:w-1/2  mb-10 md:mb-0 text-blond z-20 px-20 py-48 text-5xl text-white ">
            Unete a nosotros!
            <p class="text-blond py-6 text-lg text-white mb-2">La mejor opcion desde casa!</p>
            @auth
            @else
            <button href="/" class="bg-purple-600 hover:bg-purple-700 focus:outline-none hover:text-white px-3 py-3 rounded-md text-base font-medium"><a href="{{ route('register') }}">Registrate</a></button>
            @endauth
            <button class="bg-pink-500 hover:bg-pink-600 focus:outline-none hover:text-white px-3 py-3 rounded-md text-base font-medium"><a href="{{ route('courses.index') }}">Ver todos los cursos</a></button>
            </div>
            <video autoplay loop muted class="absolute z-10 md:w-64 w-auto min-w-full min-h-full max-w-none">
                <source   src="{{asset('video/videonail.mp4')}}"
                type="video/mp4"
                />
                Your browser does not support the video tag.
            </video>
    </header>
    @endsection
    <section class="py-20 px-20 pb-40">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold">Equipo</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Lleva tu conocimiento a otro nivel, con nuestro equipo de trabajo.
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                    <div class="px-6">
                        <img alt="..." src="https://nailspot.mx/static/img/equipo/certificacion.f2f983c602a6.jpg"
                            class="shadow-lg rounded max-w-full mx-auto" style="max-width: 180px" />
                        <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Yohana Rivas</h5>
                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                Diseñádor
                            </p>
                            <div class="mt-6">
                            <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/y.rivas86" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/nailsyohanaoficial/" class="fab fa-instagram"></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                    <div class="px-6">
                        <img alt="..." src="https://nailspot.mx/static/img/equipo/diplomados.cc99cd477f79.jpg"
                            class="shadow-lg rounded max-w-full mx-auto" style="max-width: 180px" />
                        <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Mango Manolo</h5>
                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                Uñas
                            </p>
                            <div class="mt-6">
                            <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/mangomanolo/" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/mango_manolo/" class="fab fa-instagram"></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                    <div class="px-6">
                        <img alt="..." src="https://nailspot.mx/static/img/equipo/nailing.587ae5648772.jpg"
                            class="shadow-lg rounded max-w-full mx-auto" style="max-width: 180px" />
                        <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Renato Ortiz</h5>
                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                Uñas </p>
                            <div class="mt-6">
                            <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/profile.php?id=100009998405727" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/renato_delao/" class="fab fa-instagram"></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                    <div class="px-6">
                        <img alt="..." src="https://nailspot.mx/static/img/equipo/shopping.d4a9f46a85f5.jpg"
                            class="shadow-lg rounded max-w-full mx-auto" style="max-width: 180px" />
                        <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">Aaron Amaro</h5>
                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                uñas </p>
                            <div class="mt-6">
                                <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a href="https://www.facebook.com/aaronroman.amaro" class="fab fa-facebook"></a></button><button
                                     class="bg-gradient-to-t from-purple-400 to-pink-500  text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <a  href="https://www.instagram.com/aaron_amaro_nails/" class="fab fa-instagram"></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-20 relative block bg-gradient-to-b from-purple-800  to-pink-600">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px)">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-purple-800 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
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

    <section class="relative block py-24 lg:pt-0 bg-gray-900">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap mt-12 justify-center">

                        <div class="w-full px-4 text-center">
                            <div
                                class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                                <i class="fas fa-medal text-xl"></i>
                            </div>
                            <h6 class="text-xl mt-5 font-semibold text-white mb-4">
                                Contactanos </h6>
                        </div>
                    </div>
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300">
                        <div class="flex-auto p-5 lg:p-10">
                            <h4 class="text-2xl font-semibold">Necesitas contactarnos?</h4>
                            <p class="leading-relaxed mt-1 mb-4 text-gray-600">
                                Complete este formulario y nos comunicaremos con usted en 24 horas. </p>
                            <div class="relative w-full mb-3 mt-8">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2" for="full-name">Full
                                    Nombre</label><input type="text"
                                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                    placeholder="Nombre completo" style="transition: all 0.15s ease 0s" />
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                    for="email">Email</label><input type="email"
                                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                    placeholder="Email" style="transition: all 0.15s ease 0s" />
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                    for="message">Mensaje</label><textarea rows="4" cols="80"
                                    class="px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:shadow-outline w-full"
                                    placeholder="Escribe un mensaje..."></textarea>
                            </div>
                            <div class="text-center mt-6">
                                <button
                                    class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                    type="button" style="transition: all 0.15s ease 0s">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








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