<x-app-layout>

    <div class="card mt-5">
        <div class="card-body mt-5">
            <label for="name">Nombre</label>
            <input required type="text" name="Name" autocomplete="name" placeholder="Accha Baccha" id="name"
                minlength="3">
            <Button id="submitBtn">Obtener</Button>
        </div>
    </div>

    <x-slot name="js">

        <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
        <script src="{{asset('js/certificates/index.js')}}"></script>
        <script src="{{asset('js/certificates/FileSaver.js')}}"></script>
        <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>

    </x-slot>


</x-app-layout>