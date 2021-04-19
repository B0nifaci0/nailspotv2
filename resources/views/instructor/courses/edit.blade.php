<x-instructor-layout :course="$course">

    <h1 class="text-2xl font-bold uppercase">
        Información del curso
    </h1>
    <hr class="mt-2 mb-6" />

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' =>'PUT' ,'files'=>true])
    !!}
    @include('instructor.courses.partials.form')
    <div class="btn-group pull-right">
        {!! Form::submit("Crear Curso", ['class' => 'btn btn-Add']) !!}
    </div>
    {!! Form::close() !!}

    {{-- 
        <div class="flex justify-end">
            <button type="submit"
                class="block text-center bg-pink-600 text-white font-bold py-2 px-4 rounded">Actualizar
                informacion</button>
        </div> --}}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
        </script>
    </x-slot>
    </x-app-layout>