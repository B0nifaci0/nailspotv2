<x-jet-action-section>
    <x-slot name="title">
        Autenticación de dos factores
    </x-slot>

    <x-slot name="description">
        Agregue seguridad adicional a su cuenta mediante la autenticación de dos factores.
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
            Ha habilitado la autenticación de dos factores.
            @else
            No ha habilitado la autenticación de dos factores.
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                Cuando se habilita la autenticación de dos factores, se le pedirá un token seguro y aleatorio durante la
                autenticación.
                Puede recuperar este token de la aplicación Google Authenticator de su teléfono.
            </p>
        </div>

        @if ($this->enabled)
        @if ($showingQrCode)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                La autenticación de dos factores ahora está habilitada. Escanear el siguiente código QR usando su
                teléfono 's aplicación
                authenticator
            </p>
        </div>

        <div class="mt-4 dark:p-4 dark:w-56 dark:bg-white">
            {!! $this->user->twoFactorQrCodeSvg() !!}
        </div>
        @endif

        @if ($showingRecoveryCodes)
        <div class="mt-4 max-w-xl text-sm text-gray-600">
            <p class="font-semibold">
                Almacene estos códigos de recuperación en un administrador de contraseñas seguro. Se pueden usar para
                recuperar el
                acceso a tu cuenta si se pierde tu dispositivo de autenticación de dos factores.
            </p>
        </div>

        <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
            @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
            <div>{{ $code }}</div>
            @endforeach
        </div>
        @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
            <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                <x-jet-button type="button" wire:loading.attr="disabled">
                    Habilitar
                </x-jet-button>
            </x-jet-confirms-password>
            @else
            @if ($showingRecoveryCodes)
            <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                <x-jet-secondary-button class="mr-3">
                    Regenerar códigos de recuperación
                </x-jet-secondary-button>
            </x-jet-confirms-password>
            @else
            <x-jet-confirms-password wire:then="showRecoveryCodes">
                <x-jet-secondary-button class="mr-3">
                    Mostrar códigos de recuperación
                </x-jet-secondary-button>
            </x-jet-confirms-password>
            @endif

            <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                <x-jet-danger-button wire:loading.attr="disabled">
                    Deshabilitar
                </x-jet-danger-button>
            </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>