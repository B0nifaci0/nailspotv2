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
        {!! Form::text('price', null, ['class' => 'form-input block w-full mt-1 text-center'])
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
        <img id="picture" src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg"
            class="w-full h-64 object-cover object-center">
        @endisset
        <div class=" mt-5 form-group {{ $errors->has('image') ? ' has-error' : '' }}">
            {!! Form::file('image', ['id' => 'file']) !!}
            <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>
    </figure>
    <div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
        {!! Form::label('pdf', 'Certificado') !!}
        {!! Form::file('pdf', ['class'=> 'form-input w-full mt-5']) !!}
        <small class="text-danger">{{ $errors->first('pdf') }}</small>
    </div>
</div>
<input type="hidden" name="user_id" value='{{auth()->user()->id}}'>