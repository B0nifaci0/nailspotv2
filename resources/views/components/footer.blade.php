<!-- En esta seccion se encuentra el pie de pagina del sitio (footer) -->
<footer class="relative text-indigo-100 bg-gradient-to-b from-purple-800  to-pink-600 pt-8 pb-6">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px)">
            <!--<svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"
                version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-purple-800 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>-->
        </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <!-- En este apartado se encuentra el logo y informacion descriptiva del sitio y los iconos de instagram y facebook -->
            <div class="w-full lg:w-6/12 px-4">
                <h4 class="text-3xl font-semibold">Nailspot</h4>
                <h5 class="text-lg mt-0 mb-2 text-indigo-100">Tenemos la opción correcta para ti, escribenos a través de
                    facebook, instagram o por correo electrónico y te responderemos cuanto antes.
                </h5>
                <div class="pt-5 pb-5">
                    <a
                        href="https://www.instagram.com/nailspotoficial/" class=""
                        type="button">
                        <i class="fab fa-instagram-square fa-3x"></i></a>
                        <a
                        href="https://www.facebook.com/NailspotTuPuntoDeEncuentro/"  class="ml-2"
                        type="button">
                        <i class="fab fa-facebook-square fa-3x"></i></a>
                </div>
            </div>
            <!-- Aqui termina el apartado del logo y informacion descriptiva -->
            <!-- En esta seccion se encuentran los menus de cuenta, nailspot y acerca de en donde se encuentran accesos rapidos -->
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-indigo-100 text-sm font-bold mb-2">Cuenta</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm" 
                                    href="{{route('login')}}">Iniciar Sesión</a>
                            </li>
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{route('register')}}">Registrarse</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="w-full lg:w-4/12 px-4 ml-auto">
                        <span class="block uppercase text-indigo-100 text-sm font-bold mb-2">Nailspot</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ route('courses.index') }}">Cursos</a>
                            </li>
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="{{ route('contact.index')}}">Contacto</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4">
                        <span class="block uppercase text-indigo-100 text-sm font-bold mb-2">Acerca de</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="#">Terminos &amp; Condiciones</a>
                            </li>
                            <li>
                                <a class="text-indigo-100 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                    href="#">Politica de privacidad</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Aqui termina la seccion en donde se encuentran los menus de cuenta, nailspot y acerca de en donde se encuentran accesos rapidos -->
        </div>
        <hr class="my-6 border-gray-400" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-indigo-100 font-semibold py-1">
                    Copyright © 2021 Nailspot by
                    <a href="https://www.digital-pineapple.com.mx/" class="text-indigo-100 hover:text-gray-900">Digital Pinneaple</a>.
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Aqui termina la seccion del pie de pagina del sitio (footer) -->