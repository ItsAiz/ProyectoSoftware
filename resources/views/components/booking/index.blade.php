@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Reservas</h1>

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
                    <th>Fecha Reserva</th>
                    <th>Hora Reserva</th>
                    <th>Descripción</th>
                    <th>Nro Mesa</th>
                    <th>Nombre cliente</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{$booking->bookingDate}}</td>
                        <td>{{$booking->bookingHour}}</td>
                        <td>{{$booking->description}}</td>
                        <td>{{$booking->restaurant_table_id}}</td>
                        <td>{{\App\Models\Client::all()->find($booking->client_id)->name }}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
