@extends('adminlte::page')

@section('title', 'Cupones')

@section('content_header')
<a href="{{route('admin.coupons.create')}}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-plus"></i></a>

<h1 class="text-bold text-center">Lista de cupones</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
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
                        <a class="btn btn-secondary btn-sm" href="{{route('admin.coupons.edit', $coupon)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.coupons.destroy',$coupon)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
</script>
@stop