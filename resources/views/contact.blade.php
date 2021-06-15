<x-app-layout>
    @if ($info=Session::get('exito'))
    <div class="alert absolute w-full">
        <div class="flex items-center bg-blue-500 text-white text-md font-bold px-4 py-3" role="alert">
            <p class="text-center w-full">{{$info}}</p>
        </div>
    </div>
    @endif
    <section>
        <div class="h-96 bg-purple-300">
            <iframe class="h-full w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.2800820432244!2d-103.45098048560006!3d20.576616608436506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428aca7d1b7a579%3A0xc218e033c428edd7!2sAllende%2027a%2C%20Los%20Gavilanes%2C%2045640%20Los%20Gavilanes%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1622517034994!5m2!1ses-419!2smx"></iframe>
        </div>
    </section>
    <section class="pt-5 pb-5 bg-purple-800 mx-auto relative">
        <div class="container mx-auto px-4 stactic -mt-12">
            <div class="bg-indigo-800 text-white p-5 rounded relative">
                <h2 class="text-4xl font-semibold text-center mb-4 mt-4">Contactanos</h2>
                <hr class="bg-gray-300 w-3/4 mx-auto h-0.5">
                <div class="mt-12 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-1">
                        <form method="POST" action="{{route('contact.store')}}" class="px-2"> 
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div class="md:mr-2 mb-4">
                                    <label for="name" class="text-white font-semibold">Nombre</label>
                                    <x-jet-input id="name" class="block mt-1 w-full text-black" type="text" name="name" :value="old('name')" required
                                        autofocus autocomplete="name" />
                                        @error('name')
                                            <span><small class="text-black">* {{$message}}</small></span>
                                        @enderror
                                </div>
                                <div class="md:ml-2 mb-4">
                                    <label for="surname" class="text-white font-semibold">Apellido</label>
                                    <x-jet-input id="surname" class="block mt-1 w-full text-black" type="text" name="surname" :value="old('surname')" required
                                        autofocus autocomplete="surname" />
                                        @error('surname')
                                            <span><small class="text-black">* {{$message}}</small></span>
                                        @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="name" class="text-white font-semibold">Correo Electronico</label>
                                <x-jet-input id="email" class="block mt-1 w-full text-black" type="email" name="email" :value="old('email')" required
                                    autofocus autocomplete="email" />
                                    @error('email')
                                        <span><small class="text-black">* {{$message}}</small></span>
                                    @enderror
                            </div>
                            <div class="mb-4">
                                <label for="name" class="text-white font-semibold">Comentarios</label>
                                <textarea name="message"  rows="5" value="old=('message')" id="message" required class=" resize-none block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-black" :value="old('message')"></textarea>
                                @error('message')
                                    <span><small class="text-black">* {{$message}}</small></span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <x-jet-button class="bg-pink-600">
                                    {{ __('Enviar') }}
                                </x-jet-button>
                            </div>
                        </form>
                    </div>

                    <div class="px-2 w-full md:w-11/12  mx-auto px-2 py-2 md:px-5 md:py-5 text-left">
                        <div class="w-full font-semibold">
                            <h2 class="text-center mb-3 text-2xl">¡Aprendamos juntos!</h2>
                            <p>Estamos cerca de ti, contactanos a través de nuestras redes sociales o por alguno de estos medios.</p>
                            <p class="mb-3">Podemos aclarar tus dudas, estamos a tus ordenes en todo momento.</p>
                        </div>
                        <hr>
                        <div class="w-full my-3">
                            <span class="text-white font-semibold"><i class=" fa fa-map-marker mr-2"></i>{{$contacts[0]->ubication}}</span>
                        </div>
                        <div class="w-full my-3">
                            <span class="text-white font-semibold"><i class="fas fa-phone mr-2"></i>{{$contacts[0]->phone}}</span>
                        </div>
                        <div class="w-full my-3">
                            <span class="text-white font-semibold"><i class="fas fa-envelope mr-2"></i>{{$contacts[0]->email}}</span>
                        </div>
                        <hr> 
                        <div class="inline-block mt-3 text-3xl flex flex-1">
                            <span class="mx-auto">
                                <a href="{{$contacts[0]->instagram}}" class="hover:text-gray-900" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </span>
                            <span class="mx-auto">
                                <a href="{{$contacts[0]->facebook}}"class="hover:text-gray-900"  target="_blank">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </span>
                            <span class="mx-auto">
                                <a href="#" class=" font-semibold text-white">
                                    <a href="{{$contacts[0]->youtube}}" class="hover:text-gray-900" target="_blank">
                                        <i class="fab fa-youtube-square"></i>
                                    </a>
                                </a>
                            </span>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(800);
        });
    </script>
</x-app-layout>