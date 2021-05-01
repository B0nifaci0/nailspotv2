@php
$nav_links =[
[
'name' => 'Home',
'route' => route('home'),
'active' => request()->routeIs('home')
],
[
'name' => 'Cursos',
'route' => route('courses.index'),
'active' => request()->routeIs('course*')
],
[
'name' => 'Competencias',
'route' => route('competences.index'),
'active' => request()->routeIs('competence*')
]
];
@endphp

<nav x-data="{ open: false }"
    class="top-0 absolute z-50 w-full items-center justify-between px-2 py-3 navbar-expand-lg">
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Links de Navegacion -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @foreach ($nav_links as $nav_link)
                    <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                        {{$nav_link['name']}}
                    </x-jet-nav-link>
                    @endforeach
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Menú desplegable de configuración -->
                <div class="ml-3 relative">

                    @auth
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                        <!-- Administración de cuentas -->  
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

                            <div class="border-t border-gray-100"></div>

                            <!-- Autenticacion -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                    @else
                    <div class="hidden top-0 right-0 px-6 py-8 sm:block">
                        @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                        <x-jet-nav-link href="{{ route('login') }}">
                            Ingresar
                        </x-jet-nav-link>
                        @if (Route::has('register'))
                        <x-jet-nav-link href="{{ route('register') }}">
                            Registrate
                        </x-jet-nav-link>
                        @endif
                        @endauth
                    </div>
                    @endauth
                </div>
            </div>

            <!-- Boton para desplegar el menu de navegacion -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú de navegación responsivo -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($nav_links as $nav_link)
            <x-jet-responsive-nav-link href="{{$nav_link['route']}}" :active="$nav_link['active']">
                {{($nav_link['name']) }}
            </x-jet-responsive-nav-link>

            @endforeach
        </div>

        <!-- Opciones de configuración responsiva -->
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}" />
                </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Administración de cuentas -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    Perfil
                </x-jet-responsive-nav-link>
                @can('Leer cursos')
                <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}">
                    Instructor
                </x-jet-responsive-nav-link>
                @endcan
                @can('Ver dashboard')
                <x-jet-responsive-nav-link href="{{ route('admin.home') }}">
                    Administrador
                </x-jet-responsive-nav-link>
                @endcan
                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Autenticacion -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
        @else
        <div class="py-1 border-t">
            <x-jet-responsive-nav-link href="{{route('login')}}" :active="request()->routeIs('login')">
                Ingresar
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{route('register')}}" :active="request()->routeIs('register')">
                Registrate
            </x-jet-responsive-nav-link>

        </div>
        @endauth
    </div>
</nav>