@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Reservas</h1>

        @if(\Illuminate\Support\Facades\Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{\Illuminate\Support\Facades\Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('errorMessage'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{session('errorMessage')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>ID</th>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Descripción</th>
                    <th>Mesa</th>
                    <th>Sillas</th>
                    <th>Accion</th>
                </tr>

                </thead>

                <tbody class="text-center align-middle">

                @foreach ($bookings as $booking)

                    <tr>
                        <td>{{$booking->id}}</td>
                        <td>{{$booking->bookingDate}}</td>
                        <td>{{$booking->bookingHour}}</td>
                        <td>{{$booking->description}}</td>
                        <td>{{$booking->restaurantTable->id}}</td>
                        <td>{{$booking->restaurantTable->chairNumbers}}</td>
                        <td><a href="{{url('employee/reservations/'.$booking->id)}}" class="btn btn-primary">Confirmar</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
