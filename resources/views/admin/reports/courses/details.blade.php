<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Reporte de Productos</title>

        <style>
            @import 'https://fonts.googleapis.com/css2?family=Archivo&display=swap';

            body {
                font-size: 14px;
                font-family: 'Archivo', sans-serif;
            }

            h1 {
                text-align: center;
                margin-top: 55px;
            }

            .date {
                float: right;
            }

            img {
                float: left;
                width: 150px;
                height: 129px;
            }

            table {
                border-collapse: separate;
                border-spacing: 0;
                color: #4a4a4d;
                table-layout: fixed;
                width: 100%;
                text-align: center;
            }

            th,
            td {
                padding: 10px 15px;
                vertical-align: middle;
            }

            thead {
                background: #395870;
                background: linear-gradient(#49708f, #293f50);
                color: #fff;
            }

            tbody tr:nth-child(even) {
                background: #f0f0f2;
            }

            td {
                border-bottom: 1px solid #cecfd5;
                border-right: 1px solid #cecfd5;
            }

            td:first-child {
                border-left: 1px solid #cecfd5;
            }

            .book-title {
                color: #395870;
                display: block;
            }

            .text-offset {
                color: #7c7c80;
                font-size: 12px;
            }

            .item-stock,
            .item-qty {
                text-align: center;
            }

            .item-price {
                text-align: right;
            }

            .item-multiple {
                display: block;
            }

            tfoot {
                text-align: right;
            }

            tfoot tr:last-child {
                background: #f0f0f2;
                color: #395870;
                font-weight: bold;
            }

            tfoot tr:last-child td:first-child {
                border-bottom-left-radius: 5px;
            }

            tfoot tr:last-child td:last-child {
                border-bottom-right-radius: 5px;
            }
        </style>
    </head>

    <body>

            <div>
                <h1>Curso "{{$course->name}}"</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Cupón</th>
                            <th>Precio final</th>
                            <th>Fecha compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td> {{$detail->user->name}}</td>
                            <td>"{{($detail->coupon) ? $detail->coupon->code : 'N/A'}}"</td>
                            <td>${{$detail->final_price}}</td>
                            <td>{{$detail->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${{$course->total}}</td>
                        </tr>
                    </tbody>
                    <br>
                </table>
            </div>
    </body>

</html>