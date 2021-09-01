<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title">Titulo del curso</label>
    <input type="text" value="{{isset($course->seo) ? $course->seo->title : old('title')}}" name="title" class="form-input block w-full mt-1" placeholder="Nuevo Curso" id="seoTitle" required>
    <small class="text-danger">{{$errors->first('title') }}</small>
</div>
<div class="form-group{{ $errors->has('seodescription') ? ' has-error' : '' }}">
    <label for="seodescription">Descripción del curso</label>
    <input type="text" value="{{isset($course->seo) ? $course->seo->seodescription : old('seodescription')}}" name="seodescription" class="form-input block w-full mt-1 " placeholder="Nuevo curso..." id="seoDescription" required>
    <small class="text-danger">{{ $errors->first('seodescription') }}</small>
</div>
<div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
    <label for="keywords">Palabras clave</label>
    <input type="text" value="{{isset($course->seo) ? $course->seo->keywords : old('keywords')}}" name="keywords" class="form-input block w-full mt-1 " placeholder="curso, uñas, practico, esmalte, etc" required>
    <small class="text-danger">{{ $errors->first('keywords') }}</small>
</div>