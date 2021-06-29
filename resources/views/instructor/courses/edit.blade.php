<x-instructor-layout :course="$course">
    @if(session('info'))
    <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-500 rounded " role="alert">
      <strong class="font-bold">{{session('info')}}</strong>
    </div>
    @endif
    <h1 class="mt-5 text-2xl font-bold uppercase">
        Información del cursos
    </h1>
    <div class="block">
        <input type="checkbox" name="seoActive" id="seoActive" class="float-right" onclick="showSeoFrom();">
        <label for="seoActive" class="float-right mr-2">Activar mejoramiento de busqueda</label>
    </div>
    <br>
    <hr class="mt-2 mb-6" />

    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' =>'PUT' ,'files'=>true])
    !!}
    @include('instructor.courses.partials.form')
    <div class="flex justify-end">
        {!! Form::submit('Actualizar Curso', ['class' => 'block text-center bg-pink-600 text-white font-bold py-2 px-4
        rounded mt-10']) !!}
    </div>
    {!! Form::close() !!}
    @if ($seo)
        @include('instructor.courses.partials.seo-form-update')
    @else
        @include('instructor.courses.partials.seo-form')
    @endif
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
        <script>
            (()=>{
                let form=document.getElementById('form-seo');
                console.log(document.querySelector('[name="description"]').value);
                if ({!!json_encode($seoJs)!!}) {
                    document.getElementById('seoActive').checked=true;
                    document.getElementById('seoActive').disabled=true;
                    form.classList.remove('hidden');
                } else {
                    document.getElementById('seoActive').checked=false;
                    form.classList.add('hidden');
                }
            })();
            const helpSeo=()=>{
                console.log('Esta opción es muy util porque permite posicionarte en el buscador de google');
            }
            const showSeoFrom=()=>{
                let form=document.getElementById('form-seo');
                let check=document.getElementById('seoActive').checked;
                if(check){
                    form.classList.remove('hidden');
                    window.scroll({
                        top:1200
                    });
                    helpSeo();
                }
                else{
                    form.classList.add('hidden');
                }
            }
            // document.addEventListener("DOMContentLoaded", function() {
            //     document.getElementById('form-seo').addEventListener('keyup', validateForm);
            // });
            // const palabra=(event)=>{
            //     let exp=new RegExp("/[a-z][A-Z][0-9][',']\s/g");
            //     let course=document.querySelector('[name="keywords"]').value;
            //     if(exp.test(course)){
            //         return console.log("true");
            //     }else{
            //         return console.log("false");
            //     }
            // }
        </script>
    </x-slot>
</x-instructor-layout>
