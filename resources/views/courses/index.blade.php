<x-app-layout>

@section('header')
<div class="bg-purple-800">
    <div class="slideshow">

        <div class="mySlides fade opacity-75">
          <img src="{{asset('img/slider-renato.png')}}" style="width:100%">
        </div>

        <div class="mySlides fade opacity-75">
          <img src="{{asset('img/slider-yohana.jpg')}}" style="width:100%">
        </div>

        <div class="mySlides fade opacity-75">
          <img src="{{asset('img/slider-aron.png')}}" style="width:100%">
        </div>
        <div class="relative flex justify-evenly pb-2 mx-auto mt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded-full " onclick="plusSlides(-1)"><i class="far fa-arrow-alt-circle-left fa-2x"></i></button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded-full " onclick="plusSlides(1)"><i class="far fa-arrow-alt-circle-right fa-2x"></i></button>
        </div>

    </div>
</div>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
</script>
    @endsection
    <div class="mx-auto bg-purple-800">
        <h1 class="text-6xl text-white font-bold mx-auto text-center py-10">Nuevos Cursos</h1>
        <x-whatsapp-chat />
    </div>
    @livewire('courses-index')
</x-app-layout>