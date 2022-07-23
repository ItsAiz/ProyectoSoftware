@extends('layouts.app')

    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Clientes</h1>

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
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo Documento</th>
                    <th>Nro. Documento</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody class="text-center">
                    @foreach ($clients as $client)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->lastName}}</td>
                        <td>{{$client->documentType}}</td>
                        <td>{{$client->documentNumber}}</td>
                        <td><a href="{{url('client/domicile/'.$client->id)}}" class="btn btn-primary">Seleccionar</a></td>
                    </tr>
                </tbody>
                    @endforeach
            </table>

        </div>

    </div>
