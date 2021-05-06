<x-guest-layout>
   
    @livewire('navigation')
    <!-- Aqui empieza el formulario de registro -->
    <section class="mr-4 ml-4">

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
        </section>
    <!-- Aqui termina el formulario de registro -->
</x-guest-layout>