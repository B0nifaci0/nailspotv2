<!-- En esta seccion se muestra el Menu de navegacion del sitio-->
<nav class="bg-gradient-to-r from-purple-800  to-pink-600" x-data="{open: false}">
    <div class="max-w-7x1 mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Botón de menú móvil-->
                <button x-on:click="open= true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                       Icono cuando el menú está cerrado.

                        Heroicon name: outline/menu

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Heroicon name: outline/x

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-12 w-auto"  src="{{asset('img/nail.png')}}" alt="Workflow">
                <img  class="hidden lg:block h-12 w-auto"  src="{{asset('img/nail.png')}}" alt="Workflow">
                </a>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                    
                        <!-- Accesos rapidos a las paginas del sitio -->
                        <a href="#" class="text-gray-300  hover:bg-purple-400  hover:text-white px-3 py-3 rounded-md text-base font-medium">Nosotros</a>
                        <a href="{{ route('courses.index') }}" class="text-gray-300  hover:bg-purple-400 hover:text-white px-3 py-3 rounded-md text-base font-medium">Cursos</a>
                        <a href="{{ route('competences.index') }}" class="text-gray-300  hover:bg-purple-400 hover:text-white px-3 py-3 rounded-md text-base font-medium">Competencias</a>
                        <a href="#" class="text-gray-300  hover:bg-purple-400 hover:text-white px-3 py-3 rounded-md text-base font-medium">Contacto</a>
                    </div>
                </div>
            </div>
            @auth
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Menú desplegable de perfil -->
                <div class="ml-3 relative" x-data="{ open: false}">
                    <div>
                        <button x-on:click="open = true" type="button" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover"
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
                <div x-show="open" x-on:click.away="open = false" class="absolute z-30 origin-top-right right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
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
            <a href="{{route('login')}}" class="text-gray-300 hover:bg-pink-400  hover:text-white px-3 py-3 rounded-md text-base font-medium">
                Iniciar Sesión
            </a>
            <a href="{{route('register')}}" class="text-gray-300 hover:bg-pink-400  hover:text-white px-3 py-3 rounded-md text-base font-medium">
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
            <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Nosotros</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Cursos</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Categorías</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Competencias</a>
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Contacto</a>
        </div>
    </div>
</nav>
