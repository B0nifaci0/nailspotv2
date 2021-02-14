<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del pedido</h1>
        <div class="card text-gray-500">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$course->name}}</h1>
                    <p class="text-xl font-bold ml-auto">MXN$ {{$course->price}}</p>
                </article>
                <div class="flex justify-end mt-2 mb-4">
                    <a href="{{route('payment.pay',$course)}}" class="my-button">Comprar curso</a>
                </div>
                <hr>
                <p class="text-sm mt-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique quo vero ut
                    aliquam distinctio, fugiat dignissimos obcaecati eveniet molestiae, aliquid voluptatem cum, neque
                    vitae esse vel dolores sapiente expedita nihil. <a class="text-blue-400" href="">Terminos y
                        condiciones.</a></p>
            </div>
        </div>
    </div>
</x-app-layout>