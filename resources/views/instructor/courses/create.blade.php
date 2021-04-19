<x-app-layout>
    <div class="relative  pt-16 flex content-center items-center justify-center">
    </div>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Crear Nuevo Curso</h1>
                <hr class="mt-2 mb-6">
                {!! Form::open(['method' => 'POST', 'route' => 'instructor.courses.store', 'files'=>true]) !!}
                @include('instructor.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Crear Curso', ['class' => 'block text-center bg-pink-600 text-white font-bold py-2
                    px-4
                    rounded mt-10']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
        </script>
    </x-slot>
</x-app-layout>