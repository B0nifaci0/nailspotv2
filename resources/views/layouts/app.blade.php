<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/floating-wpp.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/whatsapp/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/whatsapp/floating-wpp.js') }}"></script>
        {!! htmlScriptTagJsApi() !!}

    </head>


    <body class="text-gray-800 antialiased">
        {{-- <x-jet-banner /> --}}

        @livewire('navigation')

        <main>
            @yield('header')
            {{ $slot }}
        </main>
        @stack('modals')
        <x-whatsapp-chat />
        <x-footer />

        @livewireScripts

        @isset($js)
        {{$js}}
        @endisset
    </body>
</html>