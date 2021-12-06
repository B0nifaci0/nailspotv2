<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'readonly' ]) !!}
    <small class="text-danger">{{ $errors->first('slug') }}</small>
</div>
<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descripcion') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>
<div class="col-sm form-group{{ $errors->has('url') ? ' has-error' : '' }}">
    {!! Form::label('url', 'Video promocional') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('url') }}</small>
</div>
<div class="input-daterange input-group" id="datepicker">
    <div class='container-fluid'>
        <div class="row">
            <div class="col-sm form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                {!! Form::label('start_date', 'Fecha Inicio') !!}
                {!! Form::text('start_date', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('start_date') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                {!! Form::label('end_date', 'Fecha Fin') !!}
                {!! Form::text('end_date', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('end_date') }}</small>
            </div>
        </div>
    </div>
</div>
<div class='container-fluid'>
    <div class="row">
        <div class="col-sm form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Precio') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="col-sm form-group{{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
            {!! Form::label('subcategory_id', 'Categoria') !!}
            {!! Form::select('subcategory_id', $subcategories, null, ['id' => 'subcategory_id', 'class' =>
            'form-control'])
            !!}
            <small class="text-danger">{{ $errors->first('subcategory_id') }}</small>
        </div>
        <div class="col-sm form-group{{ $errors->has('level_id') ? ' has-error' : '' }}">
            {!! Form::label('level_id', 'Nivel') !!}
            {!! Form::select('level_id', $levels, null, ['id' => 'level_id', 'class' =>
            'form-control'])
            !!}
            <small class="text-danger">{{ $errors->first('level_id') }}</small>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('pdf') ? ' has-error' : '' }}">
    {!! Form::label('pdf', 'Certificado') !!}<br>
    {!! Form::file('pdf', ['class'=> 'form-input w-full text-gray-700 px-3 py-2 border rounded']) !!}
    @isset($competence->certificate)
    <iframe src="{{Storage::url($competence->certificate->url)}}"> </iframe>
    @endisset
    <small class="text-danger">{{ $errors->first('pdf') }}</small>
</div>
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image', 'Selecciona una imagen') !!}<br>
    {!! Form::file('image', ['class' => 'w-full text-gray-700 px-3 py-2 border rounded']) !!}
    <small class="text-danger">{{ $errors->first('image') }}</small>
    <figure>
        @isset($competence->image)
        <img id="file" src="{{$competence->image->url}}" class="object-cover object-center w-full h-64">
        @endisset
    </figure>
</div>
{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
    {!! Form::submit("Aceptar", ['class' => 'btn btn-success ml-2']) !!}
</div>