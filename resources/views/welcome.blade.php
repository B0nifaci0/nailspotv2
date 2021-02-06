<x-app-layout>
    {{-- <section>
        <video id="video_background" muted autoplay loop />
    <source  />
    </video />
    <div class="container py-36">
        <div class="w-full md:w-3/4 lg:w-1/2">
            <h1 class="text-black font-fold text-5xl"> Pagina de cursos</h1>
            <p class="text-black text-lg mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum in
                dolore quaerat dolorem unde at id. Fugit amet numquam deserunt quod ea quisquam aliquam vero
                perspiciatis magni, ipsum accusamus totam!</p>
            <div class="relative text-gray-600 mt-4">
                <input type="search" name="serch" placeholder="Buscar..."
                    class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    </section> --}}

    <!-- Video from https://coverr.co/ -->
    <article class="text-white">
        <div class="md:w-3/4 lg:w-1/2 uppercase video-title">
            <h1 class="font-fold text-5xl"> Pagina de cursos</h1>
            <p class="text-lg mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum in
                dolore quaerat dolorem unde at id. Fugit amet numquam deserunt quod ea quisquam aliquam vero
                perspiciatis magni, ipsum accusamus totam!</p>
            <div class="relative text-gray-600 mt-4">
                <input type="search" name="serch" placeholder="Buscar..."
                    class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none w-full">
                <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </div>
        </div>
        <video autoplay loop muted class="w-full">
            <source src="https://vimeo.com/manage/videos/506966668" type="video/mp4" />
            <iframe
                src="https://player.vimeo.com/video/506966668?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                width="1920" height="1080" frameborder="0" allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen title="presentacion ns_2"></iframe>
        </video>
    </article>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl">Equipo</h1>

        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-6">
            <article>
                <figure>
                    <img class="rounded-xl w-full object-cover" src="{{asset('/img/img1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1> Pruebitas</h1>
                </header>
                <p class="text-sm ">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl w-full object-cover" src="{{asset('/img/img1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1> Pruebitas</h1>
                </header>
                <p class="text-sm ">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl w-full object-cover" src="{{asset('/img/img1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1> Pruebitas</h1>
                </header>
                <p class="text-sm ">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl w-full object-cover" src="{{asset('/img/img1.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1> Pruebitas</h1>
                </header>
                <p class="text-sm ">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </article>
        </div>

    </section>

    <section class="mt-24">
        <div class="container py-36">
            <h1 class="text-gray-600 text-center text-3xl">Cursos</h1>
            <p class="text-center text-dark mt-2">Dirigete al catalogo de cursos</p>
            <div class="flex justify-center mt-4">
                <a href="{{route('courses.index')}}"
                    class="bg-blue-500  hover:bg-blue-light text-white font-bold py-2 px-4 border-b-4 border-blue-dark hover:border-blue rounded">
                    Button
                </a>
            </div>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-gray-600 text-center text-3xl">Ultimos cursos agregados</h1>
        <p class="text-black text-center text-lg mt-2">Tenemos la opción correcta para ti, escribenos a través de
            facebook,
            instagram o por correo electrónico y te responderemos cuanto antes. </p>

        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 mt-6">
            @foreach ($courses as $course)
            <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>