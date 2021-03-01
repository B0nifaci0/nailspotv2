<div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Profesor</th>
                        <th>Curso</th>
                        <th>Vendidos</th>
                        <th>Total recaudado</th>
                        <th></th>
                    </tr>
                <tbody>
                    @forelse ($courses as $course)
                    <tr>
                        <td>
                            <img class="rounded-circle zoom" src="{{ $course->teacher->profile_photo_url}}"
                                style="width: 100px; height: 100px;" />
                            {{$course->teacher->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->saleDetails->count()}}</td>
                        <td>${{$course->total}}</td>
                        <td width=" 10px">
                            <a class="btn btn-primary" href="{{route('admin.details',$course)}}">Detalles</a>
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
            {{$courses->links()}}
        </div>
    </div>
</div>