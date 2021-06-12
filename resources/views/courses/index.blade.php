<x-app-layout>
    @section('header')
    <!--Aqui empieza el Header --->
    
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
            case 2:
            {
        
                $("#slider-3").fadeOut(400);
                $("#slider-2").delay(400).fadeIn(400);
                $("#sButton3").removeClass("bg-purple-600");
                $("#sButton2").addClass("bg-purple-600");
           
            cont=2;
                
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

        function sliderButton3(){
        $("#slider-2").fadeOut(400);
        $("#slider-3").delay(400).fadeIn(400);
        $("#sButton2").removeClass("bg-purple-600");
        $("#sButton3").addClass("bg-purple-600");
        reinitLoop(4000);
        cont=2
        
        }


        $(window).ready(function(){
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-600");


            loopSlider();
        

        
        
        
        
        });
    </script>
    <div class=" bg-purple-800 pb-5">
        <div id="slider-1">
            <div class="relative top-0 w-full  mb-2  bg-cover bg-center opacity-75 text-white py-72 px-10 h-screen w-screen pb-5"
                style='background-image: url("img/slider-yohana.jpg");'>
            </div>
        </div>
        <div id="slider-2" >
            <div class="relative top-0 w-full bg-cover bg-auto bg-center  opacity-75 text-white py-72 px-10 h-screen w-screen pb-5"
                style='background-image: url("img/slider-renato.png");'>
            </div>
        </div>
    </div>
    <div class="bg-purple-800 ">
        <div class="flex justify-between w-12 mx-auto pb-2">
            <button id="sButton1" onclick="sliderButton1()" class="bg-white rounded-full w-4 p-2 mr-4 "></button>
            <button id="sButton2" onclick="sliderButton2()" class="bg-white rounded-full w-4 p-2 mr-4 "></button>
            <!--<button id="sButton3" onclick="sliderButton3()" class="bg-white rounded-full w-4 p-2 mr-4"></button>-->
        </div>
    </div>
    @endsection
    <div class="mx-auto bg-purple-800">
        <h1 class="text-6xl text-white font-bold mx-auto text-center py-10">Nuevos Cursos</h1>
        <x-whatsapp-chat />
    </div>
    @livewire('courses-index')
</x-app-layout>