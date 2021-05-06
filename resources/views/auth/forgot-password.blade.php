<x-guest-layout>
    <section class="mr-4 ml-4 ">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <h1 class="text-gray-900 text-3xl font-bold text-center">Restablecer contraseña</h1><br>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Olvidaste tu contraseña? No hay problema. Simplemente ingrese su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
            </div>
            
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
            @endif
            
            <x-jet-validation-errors class="mb-4" />
            
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                
                <div class="block">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button>
                        {{ __('Enviar enlace, para restablecer contraseña') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </section>
</x-guest-layout>
