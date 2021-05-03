<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="clearPage" wire:model="search" type="text" width="100%" class="form-control"
                placeholder="Buscar ...">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @foreach($user->roles as $role)
                            <li>
                                {{ $role->name }}
                            </li>
                            @endforeach
                        </td>
                        <td width="10px">
                            <a class="btn btn-secondary" data-toggle="tooltip" title="Editar" href="{{route('admin.users.edit',$user->id)}}"><i class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="4"> No se encontraron resultados para tu busqueda.</td>
                    </tr>
                    @endforelse
                </tbody>

                </thead>
            </table>
        </div>

        <div class="card-footer">
            {{$users->links()}}
        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection