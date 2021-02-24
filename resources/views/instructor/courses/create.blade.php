<x-app-layout>
    <div class="relative pt-16 flex content-center items-center justify-center">
    </div>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold">Crear Nuevo Curso</h1>
                <hr class="mt-2 mb-6">
                <form method="POST" action="{{ route('instructor.courses.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label>Titulo del curso</label>
                        <input type="text" name="name" id="name" value="{{old('name')}}" class=" form-input block
                            w-full mt-1 . {{($errors->has('name') ? 'border-red-500' : '')}}" autocomplete="off" />
                        @error('name')
                        <strong class="text-xs text-red-500">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Slug del curso</label>
                        <input type="text" name="slug" id="slug" value="{{old('slug')}}"
                            class="form-input block w-full mt-1 . {{($errors->has('slug') ? 'border-red-500' : '')}}"
                            readonly />
                        @error('slug')
                        <strong class="text-xs text-red-500">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label>Descripcion</label>
                        <textarea type="textarea" name="description" id="description" class="form-input block w-full" />
                        {{old('description')}}
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
                            <input type="text" name="price" value="{{old('price')}}"
                                class=" form-input block w-full mt-1 text-center . {{($errors->has('price') ? 'border-red-500' : '')}}">
                            @error('price')
                            <strong class="text-xs text-red-500">{{$message}}</strong>
                            @enderror
                        </div>
                    </div>
                    <h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>
                    <div class="grid grid-cols-2 gap-4">
                        <figure>
                            @isset($course->image)
                            <img id="picture" src="{{Storage::url($course->image->url)}}"
                                class="w-full h-64 object-cover object-center">
                            @else
                            <img id="picture"
                                src="https://brandominus.com/wp-content/uploads/2015/07/130830051724675381.jpg"
                                class="w-full h-64 object-cover object-center">
                            @endisset
                        </figure>
                        <div>
                            <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati error
                                magnam cupiditate esse molestias nesciunt eveniet id, tempore odio autem eligendi ipsa
                                veniam illo voluptatibus quidem nihil incidunt nostrum ipsam.</p>
                            <input type="file" class="form-input w-full" id="file" name="image" accept="image/*">
                        </div>
                    </div>
                    <input value="{{auth()->user()->id}}" type="hidden" name="user_id">
                    <div class="flex justify-end">
                        <button type="submit"
                            class="block text-center bg-blue-500 text-white font-bold py-2 px-4 rounded mt-10">Crear
                            informacion</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">
        </script>


    </x-slot>

</x-app-layout>