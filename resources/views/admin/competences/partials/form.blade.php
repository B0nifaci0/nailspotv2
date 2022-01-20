<div class="grid grid-cols-1 md:grid-cols-12">
    <div class="col-span-8">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'readonly']) !!}
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
                <div class="col-sm-12 col-md-6 form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                    {!! Form::label('price', 'Precio') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>
                <div
                    class="checkbox col-sm-12 col-md-6 form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
                    <div class="col-sm-offset-3 col-sm-9">
                        <p class="text-bold">Categorías</p>
                        @foreach ($categories as $category)
                            <label for="categories[]">
                                {!! Form::checkbox('categories[]', $category->id, null) !!} {{ $category->name }}
                            </label>
                        @endforeach
                        <small class="text-danger">{{ $errors->first('categories') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <h2 class="mt-8 mb-2 text-2xl font-bold">Imagen de la competencia</h2>
        <figure class="p-2">
            @isset($competence->image)
                <img id="picture" src="{{ $competence->image->url }}" class="picture">
            @else
                <img id="picture" src="https://pinkladies24-7.com/assets/images/defaultimg.png" class="picture">
            @endisset
            <div class="mt-5 form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                <div class="d-flex justify-content-center align-items-center w-100">
                    <label class="label-select d-flex flex-column align-items-center px-4 py-6 text-uppercase rounded">
                        <svg class="img-select" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Seleccionar archivo</span>
                        <input type='file' hidden id="file" name="image"
                            accept="image/png, image/jpeg, image/bmp, image/jpg" />
                    </label>
                </div>
                <div>
                    <small class="text-red-500">{{ $errors->first('image') }}</small>
                </div>
            </div>
        </figure>
    </div>
    <div class="col-sm-12 col-md-6">
        <h2 class="mt-8 mb-2 text-2xl font-bold">Certificado del curso</h2>
        <figure class="p-2">
            @isset($competence->certificate)
                <iframe src="{{ Storage::url($competence->certificate->url) }}" id="pdf" class="picture"></iframe>
            @else
                <embed type="application/pdf" id="pdf" class="picture">
            @endisset
            <div class=" mt-5 form-group {{ $errors->has('pdf') ? ' has-error' : '' }}">
                <div class="d-flex justify-content-center align-items-center w-100">
                    <label class="label-select d-flex flex-column align-items-center px-4 py-6 text-uppercase rounded">
                        <svg class="img-select" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Seleccionar archivo</span>
                        <input type='file' hidden id="filePDF" name="pdf" accept="application/pdf" />
                    </label>
                </div>
                <div>
                    <small class="text-red-500">{{ $errors->first('pdf') }}</small>
                </div>
            </div>
        </figure>
    </div>
</div>
</div>
{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="btn-group pull-right">
    {!! Form::reset('Limpiar', ['class' => 'btn btn-warning']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>
