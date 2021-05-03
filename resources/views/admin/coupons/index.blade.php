@extends('adminlte::page')

@section('title', 'Cupones')

@section('content_header')
<a href="{{route('admin.coupons.create')}}" class="btn btn-secondary  float-right" data-toggle="tooltip" title="Nuevo Cupón"><i class="fas fa-plus"></i></a>

<h1 class="text-bold text-center">Lista de cupones</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif

@section('css')
    <style>
        .tooltip { top: 0; }
    </style>
@endsection


<div class="card">
    <div class="card-body">
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Descuento</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupons as $coupon)
                <tr>
                    <td>{{$coupon->id}}</td>
                    <td>{{$coupon->description}}</td>
                    <td>{{$coupon->code}}</td>
                    @if ($coupon->type ==0)
                    <td>Monto</td>
                    <td> ${{$coupon->discount}}</td>
                    @else
                    <td>Porcentaje</td>
                    <td>{{$coupon->discount}}%</td>
                    @endif
                    <td width="10px">
                        <a class="btn btn-secondary" data-toggle="tooltip" title="Editar" href="{{route('admin.coupons.edit', $coupon)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.coupons.destroy',$coupon)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$coupons->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function(){
    $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop