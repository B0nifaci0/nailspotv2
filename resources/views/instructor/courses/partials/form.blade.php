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
<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    {!! Form::label('url', 'Url video') !!}
    {!! Form::text('url', null, ['class' => 'form-input block w-full mt-1']) !!}
    <small class="text-danger">{{ $errors->first('url') }}</small>
</div>
<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        <img id="picture" src="{{Storage::url($course->image->url)}}" class="w-full h-64 object-cover object-center">
        @else
        <img id="picture" src="https://pinkladies24-7.com/assets/images/defaultimg.png"
            class="w-full h-64 object-cover object-center">
        @endisset
        <div class=" mt-5 form-group {{ $errors->has('image') ? ' has-error' : '' }}">
            <div class="flex w-full items-center justify-center bg-grey-lighter">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Seleccionar archivo</span>
                    <input type='file' class="hidden" id="file"/>
                </label>
            </div>
            <!--{!! Form::file('image', ['id' => 'file']) !!}-->
            <div>
            <small class="text-red-500">{{ $errors->first('image') }}</small>
            </div>
        </div>
    </figure>
    <div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
        {!! Form::label('pdf', 'Certificado') !!}
        <div class="flex w-full items-center justify-center bg-grey-lighter">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Subir certificado</span>
                    <input type='file' class="hidden" />
                </label>
            </div>
        <!--{!! Form::file('pdf', ['class'=> 'form-input w-full mt-5']) !!}-->
        <small class="text-danger">{{ $errors->first('pdf') }}</small>
    </div>
</div>
<input type="hidden" name="user_id" value='{{auth()->user()->id}}'>