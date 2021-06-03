<div class="form-group{{ $errors->has('about_us') ? ' has-error' : '' }}">
    {!! Form::label('about_us', 'Acerca de nosotros') !!}
    {!! Form::text('about_us', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('about_us') }}</small> 
</div>
<input type="hidden" name="platform_id" value="1">
<div class="input-group">
    <div class="container-fluid">
        <div class="row">

            <!--<div class="col-sm form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {!! Form::label('image', 'Imagen Fondo') !!}<br>
                {!! Form::file('image', ['class' => 'w-full text-gray-700 px-3 py-2 border rounded']) !!}
                <small class="text-danger">{{ $errors->first('image') }}</small>
                <figure>
                    @isset($competence->image)
                    <img id="file" src="{{Storage::url($competence->image->url)}}" class="img-fluid">
                    @endisset
                </figure>
            </div>-->
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('vision') ? ' has-error' : '' }}">
    {!! Form::label('vision', 'Visión') !!}
    {!! Form::text('vision', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('vision') }}</small>
</div>
<div class="form-group{{ $errors->has('mision') ? ' has-error' : '' }}">
    {!! Form::label('mision', 'Misión') !!}
    {!! Form::text('mision', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('mision') }}</small>
</div>
<div class="form-group{{ $errors->has('valors') ? ' has-error' : '' }}">
    {!! Form::label('valors', 'Nuestros valores') !!}
    {!! Form::text('valors', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('valors') }}</small>
</div>
<div class="input-group">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm form-group{{ $errors->has('what_do') ? ' has-error' : '' }}">
            {!! Form::label('what_do', '¿Que hacemos?') !!}
            {!! Form::text('what_do', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('what_do') }}</small>
        </div>
        <div class="col-sm form-group{{ $errors->has('how_do') ? ' has-error' : '' }}">
            {!! Form::label('how_do', '¿Como lo hacemos?') !!}
            {!! Form::text('how_do', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('how_do') }}</small>
        </div>
        </div>
    </div>
</div>
<div class="form-group{{ $errors->has('own_expert') ? ' has-error' : '' }}">
    {!! Form::label('own_expert', 'Nuestros Expertos') !!}
    {!! Form::text('own_expert', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('own_expert') }}</small>
</div>
<div class="form-group{{ $errors->has('exp_nailspot') ? ' has-error' : '' }}">
    {!! Form::label('exp_nailspot', 'Experiencia nailspot') !!}
    {!! Form::text('exp_nailspot', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('exp_nailspot') }}</small>
</div>
<div class="input-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm form-group{{ $errors->has('video_identify') ? ' has-error' : '' }}">
                {!! Form::label('video_identify', 'Video identidad Nailspot') !!}
                {!! Form::text('video_identify', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('video_identify') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('video_exp_users') ? ' has-error' : '' }}">
                {!! Form::label('video_exp_users', 'Video experiencia alumnos') !!}
                {!! Form::text('video_exp_users', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('video_exp_users') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('video_exp_judge') ? ' has-error' : '' }}">
                {!! Form::label('video_exp_judge', 'Video experiencia jueces') !!}
                {!! Form::text('video_exp_judge', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('video_exp_judge') }}</small>
            </div>
        </div>
    </div>
</div>
<hr>
<div>
Información Yohana
</div>
<div class="input-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm form-group{{ $errors->has('cargo_yohana') ? ' has-error' : '' }}">
                {!! Form::label('cargo_yohana', 'Cargo o nivel') !!}
                {!! Form::text('cargo_yohana', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('cargo_yohana') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('oficio') ? ' has-error' : '' }}">
                {!! Form::label('oficio_yohana', 'Oficio o Profesion ') !!}
                {!! Form::text('oficio_yohana', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('oficio') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('pasatiempo_yohana') ? ' has-error' : '' }}">
                {!! Form::label('pasatiempo_yohana', 'pasatiempo') !!}
                {!! Form::text('pasatiempo_yohana', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('pasatiempo_yohana') }}</small>
            </div>
        </div>
    </div>
</div>
<hr>
<div>
Información renato
</div>
<div class="input-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm form-group{{ $errors->has('cargo_renato') ? ' has-error' : '' }}">
                {!! Form::label('cargo_renato', 'Cargo o nivel') !!}
                {!! Form::text('cargo_renato', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('cargo_renato') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('oficio_renato') ? ' has-error' : '' }}">
                {!! Form::label('oficio_renato', 'Oficio o Profesion ') !!}
                {!! Form::text('oficio_renato', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('oficio_renato') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('pasatiempo_renato') ? ' has-error' : '' }}">
                {!! Form::label('pasatiempo_renato', 'pasatiempo') !!}
                {!! Form::text('pasatiempo_renato', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('pasatiempo_renato') }}</small>
            </div>
        </div>
    </div>
</div>
<hr>
<div>
Información aron
</div>
<div class="input-form">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm form-group{{ $errors->has('cargo_aron') ? ' has-error' : '' }}">
                {!! Form::label('cargo_aron', 'Cargo o nivel') !!}
                {!! Form::text('cargo_aron', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('cargo_aron') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('oficio_aron') ? ' has-error' : '' }}">
                {!! Form::label('oficio_aron', 'Oficio o Profesion ') !!}
                {!! Form::text('oficio_aron', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('oficio_aron') }}</small>
            </div>
            <div class="col-sm form-group{{ $errors->has('pasatiempo_aron') ? ' has-error' : '' }}">
                {!! Form::label('pasatiempo_aron', 'pasatiempo') !!}
                {!! Form::text('pasatiempo_aron', null, ['class' => 'form-control']) !!}
                <small class="text-danger">{{ $errors->first('pasatiempo_aron') }}</small>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('user_id', auth()->user()->id) !!}
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
    {!! Form::submit("Aceptar", ['class' => 'btn btn-success ml-2']) !!}
</div>