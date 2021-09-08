
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('seo')
        
        <title>@yield('title','Nailspot')</title>

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
        @yield('structuredData')
        {!! htmlScriptTagJsApi() !!}

        <!---Google Analitycs--->
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-WDPFW1S3L4"></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];
                        function gtag(){dataLayer.push(arguments);}
                        gtag('js', new Date());

                        gtag('config', 'G-WDPFW1S3L4');
                    </script>

        <!---Termina Google analitycs--->
        @yield('css')
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
        @auth
            <script src="{{asset('js/enable-push.js')}}" defer></script>
        @endauth
    </body>
</html>