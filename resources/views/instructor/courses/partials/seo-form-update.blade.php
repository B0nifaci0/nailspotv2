<form action="{{route('instructor.course.seo.update',$seo)}}" method="POST" enctype="multipart/form-data" id="form-seo">
    @csrf @method('PUT')
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">Titulo del curso</label>
        <input type="text" name="title" class="form-input block w-full mt-1 text-black" value="{{$seo->title}}" placeholder="Nuevo Curso">
        <small class="text-danger">{{ $errors->first('title') }}</small>
    </div>
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description">Descripción del curso</label>
        <input type="text" name="description" class="form-input block w-full mt-1 text-black" value="{{strip_tags($seo->description)}}" placeholder="Este es el nuevo curso...">
        <small class="text-danger">{{ $errors->first('description') }}</small>
    </div>
    <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
        <label for="keywords">Palabras clave</label>
        <input type="text" name="keywords" class="form-input block w-full mt-1 text-black" value="{{$seo->keywords}}" placeholder="curso, uñas, 3D, esmalte, etc">
        <small class="text-danger">{{ $errors->first('keywords') }}</small>
    </div>
    <div class="form-group{{ $errors->has('video_thumbnail') ? ' has-error' : '' }}">
        <label for="video_thumbnail">Url de la minuatura del video</label>
        <input type="url" name="video_thumbnail" class="form-input block w-full mt-1 text-black" value="{{$seo->video_thumbnail}}" placeholder="https://ejemplo.com/ejemplo.png">
        <small class="text-danger">{{ $errors->first('video_thumbnail') }}</small>
    </div>
    <div class="flex justify-end">
        <button class="block text-center bg-pink-600 text-white font-bold py-2 px-4
        rounded mt-10 cursor-pointer">Actualizar Seo</button>
    </div>
</form>