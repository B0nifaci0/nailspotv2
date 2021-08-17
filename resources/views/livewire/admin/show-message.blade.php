<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" width="100%" class="form-control"
                placeholder="Buscar ...">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                <tbody>
                    @forelse ($messages as $message)
                    <tr>
                        <td>{{$message->name}}</td>
                        <td>{{$message->surname}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->phone}}</td>
                        <td>{{$message->message}}</td>
                        <td>{{$message->created_at->format('d/m/Y')}}</td>
                        <td class="d-flex justify-content-end">
                            <form method="POST" action="{{route('admin.message.delete', $message)}}">
                                @csrf @method('delete')
                                <button class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    @empty
                    <tr class="text-center">
                        <td colspan="6"> No se encontraron resultados para tu busqueda.</td>
                    </tr>
                    @endforelse
                </tbody>

                </thead>
            </table>
        </div>

        <div class="card-footer">
            {{$messages->links()}}
        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).ready(function(){
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
@endsection
