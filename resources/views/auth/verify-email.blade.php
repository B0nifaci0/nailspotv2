<x-guest-layout>
    <!-- Aqui se encuentra la card en donde solicita verificar el correo -->
    <div class="bg-purple-800">
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <div class="mb-4 text-sm text-gray-600 text-justify">
                <div class="text-gray-800 font-bold text-xl text-center">¡Gracias por inscribirse! </div>
                <p class="font-semibold text-lg">Antes de empezar...</p>
                <p class="font-semibold text-lg">¿Podría verificar su dirección de correo electrónico haciendo
                clic en el
                enlace que acabamos de enviarle por correo electrónico? Si no recibió el correo electrónico, con mucho gusto
                le
                enviaremos otro.</p>
            </div>

            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-md text-justify text-green-600">
                Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante
                el registro.
            </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit" class="bg-pink-600 hover:bg-pink-700 text-white font-bold text-lg py-2 px-4 rounded">
                            Reenviar correo de verificación.
                        </x-jet-button>
                    </div>
                </form>

            </div>
            <div class="mt-4 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-lg text-gray-600 hover:text-gray-900">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </x-jet-authentication-card>
    </div>
    <!-- Aqui termina la card en donde solicita verificar el correo -->
</x-guest-layout>