@extends('layouts.app')
<div class="container">
    <!--onclick="window.location.reload();"-->
    <a href="{{ app('request')->input('a') }}" class="btn btn-primary" style="float: left;">Domicilios</a>
    <a href="{{url('client/bookings/'.request()->{'client'})}}" class="btn btn-primary" style="float: right;">Reservas</a>
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
                <th>Detalle de Compra</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                </tr>
            </tbody>
        </table>

    </div>

</div>
