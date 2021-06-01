<nav class="bg-gradient-to-r from-purple-800 to-pink-600" x-data="{open: false}">
    <div class="px-2 mx-auto max-w-7x1 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Botón de menú móvil-->
                <button x-on:click="open= true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                       Icono cuando el menú está cerrado.

                        Heroicon name: outline/menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Heroicon name: outline/x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <a href="/" class="flex items-center flex-shrink-0">
                <img class="block w-auto h-12 lg:hidden"  src="{{asset('img/nail.png')}}" alt="Workflow">
                <img  class="hidden w-auto h-12 lg:block"  src="{{asset('img/nail.png')}}" alt="Workflow">
                </a>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                    
                        <!-- Accesos rapidos a las paginas del sitio -->
                        <!--<a href="#" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-purple-400 hover:text-white">Nosotros</a>-->
                        <a href="{{ route('courses.index') }}" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-purple-400 hover:text-white">Cursos</a>
                        <a href="{{ route('competences.index') }}" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-purple-400 hover:text-white">Competencias</a>
                        <a href="{{ route('contact.index')}}" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-purple-400 hover:text-white">Contacto</a>
                    </div>
                </div>
            </div>
            @auth
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Menú desplegable de perfil -->
                <div class="relative ml-3" x-data="{ open: false}">
                    <div>
                        <button x-on:click="open = true" type="button" class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                <img class="object-cover w-8 h-8 rounded-full"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                    </div>

                    <!--
                        Menú desplegable, mostrar / ocultar según el estado del menú.

                        Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                        Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->
                <div x-show="open" x-on:click.away="open = false" class="absolute right-0 z-30 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        Perfil
                    </x-jet-dropdown-link>
                    @can('Leer cursos')
                    <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                        Instructor
                    </x-jet-dropdown-link>
                    @endcan
                    @can('Leer competencias')
                    <x-jet-dropdown-link href="{{ route('judge.competences.index') }}">
                        Juez
                    </x-jet-dropdown-link>
                    @endcan
                    @can('Ver dashboard')
                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                        Administrador
                    </x-jet-dropdown-link>
                    @endcan
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                            this.closest('form').submit();">Cerrar Sesión
                        </a>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div>
            <a href="{{route('login')}}" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-pink-400 hover:text-white">
                Iniciar Sesión
            </a>
            <a href="{{route('register')}}" class="px-3 py-3 text-base font-medium text-gray-300 rounded-md hover:bg-pink-400 hover:text-white">
                Registrarse
            </a>
        </div>
        @endauth
    </div>
    <!-- Menú móvil, mostrar / ocultar según el estado del menú. -->
    <div class="sm:hidden" x-show="open" x-on:click.away="open = false" >
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Accesos rapidos a las paginas del sitio -->
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <!--<a href="#" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">Nosotros</a>-->
            <a href="{{ route('courses.index') }}" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Cursos</a>
            <!--<a href="#" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Categorías</a>-->
            <a href="{{ route('competences.index') }}" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Competencias</a>
            <a href="{{route('contact.index')}}" class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Contacto</a>
        </div>
    </div>
</nav>
