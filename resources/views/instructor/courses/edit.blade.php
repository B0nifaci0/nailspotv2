<x-instructor-layout :course="$course">

    <h1 class="text-2xl font-bold uppercase">
        Información del curso
    </h1>
    <hr class="mt-2 mb-6" />

    <form method="POST" action="{{ route('instructor.courses.update',['course' => $course]) }}"
        enctype="multipart/form-data">
        @csrf @method('PATCH')
        <div class="mb-4">
            <label>Titulo del curso</label>
            <input type="text" name="name" id="name" value="{{old('name',$course->name)}}" class=" form-input block
                            w-full mt-1" />
            @error('name')
            <strong class="text-xs text-red-500">{{$message}}</strong>
            @enderror
        </div>
        <div class="mb-4">
            <label>Slug del curso</label>
            <input type="text" name="slug" id="slug" value="{{old('slug',$course->slug)}}"
                class="form-input block w-full mt-1" />
            @error('slug')
            <strong class="text-xs text-red-500">{{$message}}</strong>
            @enderror
        </div>
        <div class="mb-4">
            <label>Descripcion</label>
            <textarea type="textarea" name="description" id="description" class="form-input block w-full" />
            {{old('description',$course->description)}}
                        </textarea>
            @error('description')
            <strong class="text-xs text-red-500">{{$message}}</strong>
            @enderror
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div>
                <label>Categoria</label>
                <select name="category_id" class="form-input block w-full mt-1">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label>Nivel</label>
                <select name="level_id" class="form-input block w-full mt-1">
                    @foreach ($levels as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Precio</label>
                <input type="text" name="price" value="{{old('price',$course->price)}}" class=" form-input block w-full mt-1
            text-center">
                @error('price')
                <strong class="text-xs text-red-500">{{$message}}</strong>
                @enderror
            </div>
        </div>
        <div class="mb-4 mt-4">
            <label>Url Video</label>
            <input type="text" name="url" value="{{old('url',$course->url)}}" class="form-input block w-full mt-1" />
            @error('url')
            <strong class="text-xs text-red-500">{{$message}}</strong>
            @enderror
        </div>
        <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
        <div class="grid grid-cols-2 gap-4">
            <figure>
                @isset($course->image)
                <img id="picture" src="{{Storage::url($course->image->url)}}"
                    class="w-full h-64 object-cover object-center">
                @else
                <img id="picture" src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg"
                    class="w-full h-64 object-cover object-center">
                @endisset
            </figure>
            <div>
                <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati error
                    magnam cupiditate esse molestias nesciunt eveniet id, tempore odio autem eligendi ipsa
                    veniam illo voluptatibus quidem nihil incidunt nostrum ipsam.</p>
                <input type="file" class="form-input w-full" id="file" name="image" accept="image/*">
                @error('image')
                <strong class="text-xs text-red-500">{{$message}}</strong>
                @enderror
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="block text-center bg-blue-500 text-white font-bold py-2 px-4 rounded">Actualizar
                informacion</button>
        </div>
    </form>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
        </script>
    </x-slot>
    </x-app-layout>