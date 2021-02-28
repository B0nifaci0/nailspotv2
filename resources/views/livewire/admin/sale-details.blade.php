<div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Cupón</th>
                        <th>Precio final</th>
                    </tr>
                <tbody>
                    @forelse ($details as $detail)
                    <tr>
                        <td>
                            <img class="rounded-circle" src="{{ $detail->user->profile_photo_url }}" />
                            {{$detail->user->name}}</td>
                        </td>
                        <td>"{{($detail->coupon) ? $detail->coupon->code : 'N/A'}}"</td>
                        <td>${{$detail->final_price}}</td>

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
            {{$details->links()}}
        </div>
    </div>
</div>