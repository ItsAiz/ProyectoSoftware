@extends('layouts.app')
<div class="container">
    <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Detalles</h1>
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="mt-3 mb-3" style="overflow-x:auto;">

        <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

            <thead class="table text-center" style="background: #202022; color: white">

            <tr style="border-color: black">
                <th>ID Detalle</th>
                <th>ID Domicilio</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            </thead>
            <tbody class="text-center">
            @foreach ($details as $detail)
                <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->domicile_sale_id}}</td>
                    <td>{{$detail->name}}</td>
                    <td>{{$detail->price}}</td>
                    <td>{{$detail->amount}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{url('domiciles/management')}}"style="float: right;">Regresar</a>
</div>
