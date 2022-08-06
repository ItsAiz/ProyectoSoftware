@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Auth::user()->rol->description == 'administrator')
            <a href="{{ app('request')->input('a') }}" class="btn btn-primary" style="float: left;">Domicilios</a>
            <a href="{{url('client/bookings/'.$client->id)}}" class="btn btn-primary" style="float: right;">Reservas</a>
        @else
            <a href="{{ route('activityHistory') }}" class="btn btn-primary" style="float: left;">Domicilios</a>
            <a href="{{url('bookings/'.$client->id)}}" class="btn btn-primary" style="float: right;">Reservas</a>
        @endif

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Domicilios</h1>

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
                    <th>Fecha Domicilio</th>
                    <th>Total</th>
                    <th>Detalle de Compra</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($domiciles as $domicile)
                    <tr>
                        <td>{{$domicile->saleDate}}</td>
                        <td>{{$domicile->totalCost}}</td>

                        @if(Auth::user()->rol->description == 'administrator')
                            <td>
                                <a href="{{url('client/domicile/details/'.$domicile->id)}}" class="btn btn-primary">Seleccionar</a>
                            </td>
                        @else
                            <td>
                                <a href="{{url('domicile/details/' .$domicile->id)}}" class="btn btn-primary">Seleccionar</a>
                            </td>
                        @endif

                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

        @if(Auth::user()->rol->description == 'administrator')
            <a class="btn btn-primary" href="{{route('client/management')}}" style="float: right;">Regresar</a>
        @endif

    </div>
@endsection
