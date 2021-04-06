<x-app-layout>
    @section('header')
    <!--Aqui empieza el Header --->
    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
        style="background-image: url(https://media-nailspot.s3.amazonaws.com/media/CACHE/images/courses/6236d801-efb3-4e91-bf8c-34f3b3ccc57a/2964d9c36e85927e9bfd44744bc74833.png); background-size: cover; background-position: center;">
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-bold text-6xl">
                            Acuarela By Renato Ortiz
                        </h1><br>
                        <p class="mt-4 text-md text-white">
                            Curso de acuarela básico Renato Ortiz...
                        </p><br>
                        <a href="#" class="rounded mt-2  text-black text-center text-2xl my-2 bg-white hover:bg-gray-300">
                        Ver curso > </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Aqui termina-->
    <div class="mx-auto bg-gray-500">
    <h1 class="text-6xl text-white font-bold mx-auto text-center py-10">Novedades</h1>
    </div>
    <!--De aquì empuizan los cards--->
    <div class="flex flex-wrap -m-3 p-10 bg-gray-500"> 
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3 transform hover:scale-105">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
            <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1523978591478-c753949ff840?w=900);"></div>
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h3 class="mb-4 text-4xl text-center">Diplomados</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                    </div>
                    <a href="#" 
                        class="bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2  ">
                        Más información
                    </a>
                </div>
            </div>  
        </div>
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3 transform hover:scale-105">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
            <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1497398276231-94ff5dc90217?w=900);"></div>
                <div class="p-4 flex-1 flex flex-col" style="">
                <h3 class="mb-4 text-4xl text-center">Certificación</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, tempore sapiente eveniet quibusdam ab ea, quaerat placeat numquam aspernatur, accusamus magnam neque.</p>
                    </div>
                    <a href="#" 
                        class="bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2  ">
                        Más información
                    </a>
                </div>
            </div>  
        </div>
  
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-3 transform hover:scale-105">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1 flex flex-col">
            <div class="bg-cover h-48" style="background-image: url(https://images.unsplash.com/photo-1503863937795-62954a3c0f05?w=900);"></div>
                <div class="p-4 flex-1 flex flex-col" style="">
                <h3 class="mb-4 text-4xl text-center">Competencias</h3>
                    <div class="mb-4 text-grey-darker text-sm flex-1">
                        <p>Shorter text.</p>
                    </div>
                    <a href="{{route('competences.index')}}" 
                        class="bg-gradient-to-r from-purple-400 to-pink-400 rounded text-white text-center text-xl my-2  ">
                        Más información
                    </a>
                </div>
            </div>  
        </div>
    </div>
    <!--Aqui terminan los card--->
  </div>
    @endsection
    @livewire('courses-index')
</x-app-layout>