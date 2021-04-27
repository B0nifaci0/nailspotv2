<x-guest-layout>
    @livewire('navigation')
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <div class="flex-shrink-0 flex items-center justify-center pb-6">
            <p class="text-xl">Registrarse</p>
        </div>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- <div x-data="{open: true}">

                <div class="mt-4" x-show="open">
                    <x-jet-label for="level_id" value="{{ __('Nivel') }}" />
            <select name="level_id" id='level_id' class='block mt-1 w-full'>
                @foreach ($levels as $level)
                <option value="{{$level->id}}">{{$level->name}}</option>
                @endforeach
            </select>
            </div>

            <div>
                <x-jet-input x-on:click="open = !open" class="isShowing = true" type="checkbox" name='judge' />
                Registrarse como Juez
            </div>
            </div> --}}
            <div class="mt-4">
                <x-jet-label for="level_id" value="{{ __('Nivel') }}" />
                <select name="level_id" id='level_id' class='block mt-1 w-full' :value="old('level_id')">
                    @foreach ($levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif
            <div class="form-group mt-5">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <div class="bg-red-100 border border-red-400 mt-5 text-red-700 px-4 py-3 rounded relative" role="alert">
                          <strong class="font-bold">Atención!</strong>
                          <span class="block sm:inline">Por favor indica que no eres un robot.</span>
                          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                          </span>
                        </div>
                        @enderror
            </div>
            <div class="flex flex-wrap items-center justify-end mt-4">
                <p class="text-gray-400"> 
                Dar click en registrar indica que estás de acuerdo con los <a class="text-pink-600" href="#">términos y condiciones</a> del servicio, así como nuestra <a class="text-pink-600" href="#">política de privacidad</a>.
                </p>
                <a class="underline text-sm text-gray-200 hover:text-gray-400" href="{{ route('login') }}">
                    {{ __('Ya estas registrado?') }}
                </a>
                <x-jet-button class="ml-4 bg-pink-600">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>