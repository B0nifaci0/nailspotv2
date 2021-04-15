<x-app-layout>
    @section('header')
    <!--Aqui empieza el Header --->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
        <script>
            var cont=0;
        function loopSlider(){
            var xx= setInterval(function(){
            switch(cont)
            {
            case 0:{
                $("#slider-1").fadeOut(400);
                $("#slider-2").delay(400).fadeIn(400);
                $("#sButton1").removeClass("bg-purple-600");
                $("#sButton2").addClass("bg-purple-600");
            cont=1;
        
            break;
            }
            case 1:
            {
        
                $("#slider-2").fadeOut(400);
                $("#slider-1").delay(400).fadeIn(400);
                $("#sButton2").removeClass("bg-purple-600");
                $("#sButton1").addClass("bg-purple-600");
           
            cont=0;
                
            break;
            }
            }},8000);

        }

        function reinitLoop(time){
        clearInterval(xx);
        setTimeout(loopSlider(),time);
        }



        function sliderButton1(){

        $("#slider-2").fadeOut(400);
        $("#slider-1").delay(400).fadeIn(400);
        $("#sButton2").removeClass("bg-purple-600");
        $("#sButton1").addClass("bg-purple-600");
        reinitLoop(4000);
        cont=0

        }

        function sliderButton2(){
        $("#slider-1").fadeOut(400);
        $("#slider-2").delay(400).fadeIn(400);
        $("#sButton1").removeClass("bg-purple-600");
        $("#sButton2").addClass("bg-purple-600");
        reinitLoop(4000);
        cont=1
        
        }

        $(window).ready(function(){
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-600");


            loopSlider();
        

        
        
        
        
        });
  </script>
    <div class="sliderAx bg-purple-800">
        <div id="slider-1" class=" mx-auto">
            <div class="bg-cover bg-center  opacity-75 text-white py-72 px-10 object-fill" style='background-image: url("https://media-nailspot.s3.amazonaws.com/media/CACHE/images/courses/6236d801-efb3-4e91-bf8c-34f3b3ccc57a/2964d9c36e85927e9bfd44744bc74833.png");'>
                <div class="md:w-1/2">
                    <p class="font-bold text-2xl uppercase">Competencia 1</p>
                    <p class="text-6xl font-bold">Hello world</p>
                    <p class="text-3xl mb-10 leading-none">Carousel with TailwindCSS </p>
                    <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Ver más</a>
                </div>  
            </div> <!-- container -->
            <br>
        </div>
        <div id="slider-2" class=" mx-auto">
            <div class="bg-cover bg-center  opacity-75 text-white py-72 px-10 object-fill" style='background-image: 
            url("https://images.unsplash.com/photo-1617289749213-c2a7b44f6523?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1914&q=80");'>
                <div class="md:w-1/2">
                    <p class="font-bold text-md uppercase">Competencia 2</p>
                    <p class="text-6xl font-bold">Hello world</p>
                    <p class="text-3xl mb-10 leading-none">Carousel with TailwindCSS </p>
                    <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Ver más</a>
                </div>
            </div> <!-- container -->
            <br>
        </div>
        <div  class="flex justify-between w-12 mx-auto pb-2">
            <button id="sButton1" onclick="sliderButton1()" class="bg-white rounded-full w-4 pb-2 " ></button>
            <button id="sButton2" onclick="sliderButton2() " class="bg-white rounded-full w-4 p-2"></button>
        </div>
    </div>
    @endsection
    @livewire('courses-index')
</x-app-layout>