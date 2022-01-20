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
                            <img style="width: 4.5rem;"  class="rounded-circle" src="{{ $course->teacher->profile_photo_url}}" />
                            {{$course->teacher->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$course->sales->count()}}</td>
                        <td>${{$course->total}}</td>
                        <td width=" 10px">
                            <a class="btn btn-info" href="{{route('admin.sales.courses.details',$course)}}">Detalles</a>
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