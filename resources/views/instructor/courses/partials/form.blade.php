<div class="grid grid-cols-1 md:grid-cols-12">
    <div class="col-span-8">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Titulo del curso') !!}
            {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-input block w-full mt-1']) !!}
            <small class="text-danger">{{ $errors->first('slug') }}</small>
        </div>

        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            {!! Form::label('description', 'Descripcion') !!}
            {!! Form::textarea('description', null, ['id'=>'description']) !!}
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="grid grid-cols-3 gap-6">
            <div class="col-sm form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories, null, ['id' => 'category_id', 'class' =>
                'form-input block w-full mt-1 text-center'])
                !!}
                <small class="text-danger">{{ $errors->first('category_id') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
                {!! Form::label('level_id', 'Nivel') !!}
                {!! Form::select('level_id', $levels, null, ['id' => 'level_id', 'class' =>
                'form-input block w-full mt-1 text-center'])
                !!}
                <small class="text-danger">{{ $errors->first('level_id') }}</small>
            </div>
            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                {!! Form::label('price', 'Precio') !!}
                {!! Form::text('price', null, ['class' => 'form-input block w-full mt-1 text-center','id'=>'price'])
                !!}
                <small class="text-danger">{{ $errors->first('price') }}</small>
            </div>
        </div>
        <div class="col-sm form-group{{ $errors->has('platform_id') ? ' has-error' : '' }}">
            {!! Form::label('platform_id', 'Plataforma') !!}
            {!! Form::select('platform_id', $platforms, null, ['id' => 'platform_id', 'class' =>
            'form-input block w-full mt-1 text-center'])
            !!}
            <small class="text-danger">{{ $errors->first('category_id') }}</small>
        </div>
        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
            {!! Form::label('url', 'Url video') !!}
            {!! Form::text('url', null, ['class' => 'form-input block w-full mt-1']) !!}
            <small class="text-danger">{{ $errors->first('url') }}</small>
        </div>
    </div>
    <div class="col-span-4 sm:mt-2 md:pl-6 md:-mt-14">
        <p class="text-2xl md:mb-6">Posicionamiento Web</p>
       @include('instructor.courses.partials.seo-form')
    </div>
</div>
<br>
<div class="relative p-2  md-flex bg-indigo-20">
    <div class="sm-2/2 md:w-3/3 lg:w-4/4 xl-5/5">
        <section class="m-4 mt-5  mb-5 card shadow">
            <h1 class="mb-2 text-5xl text-center justify-items-center mt-2">Imagen del curso</h1>
            <div class="flex-none overflow-hidden text-center bg-center bg-cover pb-5 ">
                <figure>
                    @isset($course->image)
                    <img id="picture" src="{{Storage::url($course->image->url)}}" class="object-cover object-center w-full h-64">
                    @else
                    <img id="picture" src="https://pinkladies24-7.com/assets/images/defaultimg.png"
                        class="object-cover object-center " style="width: 100%;">
                    @endisset
                    <div class=" mt-5 form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                        <div class="flex items-center justify-center w-full bg-grey-lighter">
                            <label
                                class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-blue-500 uppercase bg-white border rounded-lg shadow-lg cursor-pointer border-blue hover:bg-blue-500 hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Seleccionar archivo</span>
                                <input type='file' class="hidden" id="file" name="image" />
                            </label>
                        </div>
                        <div>
                            <small class="text-red-500">{{ $errors->first('image') }}</small>
                        </div>
                    </div>
                </figure>
            </div>
        </section>
    </div>
    <div class="sm:w-2/2 md:w-3/3 lg:w-4/4 xl:w-5/5">
        <section class="mt-5 mb-5 ml-4 mr-4 card shadow">
            <div class="flex flex-col flex-1 p-4" style="">
                <h1 class="mb-2 text-5xl text-center justify-items-center">Certificado del curso</h1>
                <div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
                    {!! Form::label('pdf', 'Certificado', ['class', 'hidden']) !!}
                    <div class="flex items-center justify-center w-full bg-grey-lighter">
                        <label
                            class="flex flex-col items-center w-64 px-4 py-6 tracking-wide text-blue-500 uppercase bg-white border rounded-lg shadow-lg cursor-pointer border-blue hover:bg-blue-500 hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Subir certificado</span>
                            <input type='file' class="hidden" name='pdf' />
                        </label>
                    </div>
                    <br>
                    @isset($course->certificate)
                    <iframe class="pb-5" src="{{Storage::url($course->certificate->url)}}"  width="100%" height="700px" frameborder="0" allowfullscreen > </iframe>
                    @endisset
                    <small class="text-danger">{{ $errors->first('pdf') }}</small>
                </div>
            </div>
        </section>
    </div>
</div>
<input type="hidden" name="user_id" value='{{auth()->user()->id}}'>