@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Domicilios</h1>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{url('send/orders')}}" class="d-inline" method='post'>
            @csrf
            {{method_field('POST')}}
            <input type='submit' value="Enviar y guardar información" class="btn btn-success">
        </form>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>ID Domicilio</th>
                    <th>Fecha Domicilio</th>
                    <th>Nombre Cliente</th>
                    <th>Dirección Cliente</th>
                    <th>Nro Teléfono Cliente</th>
                    <th>Total</th>
                    <th>Detalle de Compra</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($domiciles as $domicile)
                    <tr>
                        <td>{{$domicile->id}}</td>
                        <td>{{$domicile->saleDate}}</td>
                        <td>{{$domicile->name}}</td>
                        <td>{{$domicile->address}}</td>
                        <td>{{$domicile->phoneNumber}}</td>
                        <td>{{$domicile->totalCost}}</td>
                        <td><a href="{{url('/domiciles/management/'.$domicile->id)}}" class="btn btn-primary">Visualizar
                                Detalle</a></td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
    </div>

@endsection
