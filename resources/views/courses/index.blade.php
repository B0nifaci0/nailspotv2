<x-app-layout>

  @section('header')
  <div class="bg-purple-800">
    <div class="slideshow">

      <div class="opacity-75 mySlides fade">
        <img src="{{asset('img/slider-renato.png')}}" style="width:100%">
      </div>

      <div class="opacity-75 mySlides fade">
        <img src="{{asset('img/slider-yohana.jpg')}}" style="width:100%">
      </div>

      <div class="opacity-75 mySlides fade">
        <img src="{{asset('img/slider-aron.png')}}" style="width:100%">
      </div>
      <div class="relative flex pb-2 mx-auto mt-4 justify-evenly">
        <button class="font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 " onclick="plusSlides(-1)"><i
            class="far fa-arrow-alt-circle-left fa-2x"></i></button>
        <button class="font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 " onclick="plusSlides(1)"><i
            class="far fa-arrow-alt-circle-right fa-2x"></i></button>
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
    <h1 class="py-10 mx-auto text-6xl font-bold text-center text-white">Nuevos Cursos</h1>
    <x-whatsapp-chat />
  </div>
  @livewire('courses-index')
</x-app-layout>