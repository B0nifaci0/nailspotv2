<x-guest-layout>
    @livewire('navigation')
  
    <!-- Aqui comienza el formulario para el inicio de sesion -->
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="flex-shrink-0 flex items-center justify-center pb-6">
            <p class="text-xl">Iniciar Sesión</p>
        </div>
        <x-jet-validation-errors class="mb-4 transparent " />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST"  onsubmit="return submitUserForm();" action="{{ route('login') }}">
            @csrf

            
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-900">{{ __('Recuérdame') }}</span>
                </label>
            </div>
            <div class="form-group mt-5 ">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
            </div>
            <div class="bg-red-100 border border-red-400 mt-5 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">La casilla de verificación "No soy un robot" es requerida!</span>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-900 hover:text-gray-400" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 bg-pink-600">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <!-- Aqui termina el formulario para el inicio de sesion -->
</x-guest-layout>
