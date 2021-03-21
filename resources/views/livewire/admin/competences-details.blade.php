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
                    @forelse ($competences as $competence)
                    <tr>
                        <td>
                            <img class="rounded-circle zoom" src="{{ $competence->teacher->profile_photo_url}}" />
                            {{$competence->teacher->name}}</td>
                        <td>{{$competence->name}}</td>
                        <td>{{$competence->sales->count()}}</td>
                        <td>${{$competence->total}}</td>
                        <td width=" 10px">
                            <a class="btn btn-primary" href="{{route('admin.sales.competences.details',$competence)}}">Detalles</a>
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
            {{$competences->links()}}
        </div>
    </div>
</div>