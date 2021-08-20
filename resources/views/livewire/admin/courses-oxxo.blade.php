<div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alumno</th>
                        <th>Cupón</th>
                        <th>Precio final</th>
                        <th>Fecha compra</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                <tbody>
                    @forelse ($sales as $sale)
                    <tr>
                        <td>
                            <img class="rounded-circle" src="{{ $sale->user->profile_photo_url }}" />
                            {{$sale->user->name}}</td>
                        </td>
                        <td>"{{($sale->coupon) ? $sale->coupon->code : 'N/A'}}"</td>
                        <td>${{$sale->final_price}}</td>
                        <td>{{$sale->created_at}}</td>
                        <td>{{($sale->status==0) ? 'PENDIENTE' : 'APROBADO'}}</td>
                        <td>
                            @if ($sale->status==0)
                            <form action="{{ route('admin.course.paid',$sale->id) }}" method="post">
                                @csrf
                                <button type="submit">Verificado</button>
                            </form>
                            @endif
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

        {{-- <div class="card-footer">
            {{$sales->links()}}
    </div> --}}
</div>
</div>