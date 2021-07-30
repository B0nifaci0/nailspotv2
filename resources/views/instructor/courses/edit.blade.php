<x-instructor-layout :course="$course">
    @if(session('info'))
    <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-500 rounded " role="alert">
      <strong class="font-bold">{{session('info')}}</strong>
    </div>
    @endif
    <h1 class="mt-5 text-2xl font-bold uppercase">
        Información del cursos
    </h1>
    <br>
    <hr class="mt-2 mb-6" />
    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' =>'PUT' ,'files'=>true])
    !!}
    @include('instructor.courses.partials.form')
    <div class="flex justify-end">
        {!! Form::submit('Actualizar Curso', ['class' => 'cursor-pointer block text-center bg-pink-600 text-white font-bold py-2 px-4
        rounded mt-10']) !!}
    </div>
    {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>
</x-instructor-layout>
