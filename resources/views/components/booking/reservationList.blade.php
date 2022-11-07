@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Reservas</h1>

        <a href="{{url('booking/create')}}" class="btn btn-success">Solicitar reserva</a>

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
                    <th>Estado</th>
                    <th>Acción</th>
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
                        <td>{{($booking->status == 0) ? 'En curso' : 'Finalizada'}}</td>
                        <td>
                            <form action="{{url('/booking/destroy/'.$booking->id)}}" class="d-inline confirmation_alert"
                                  method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' value="Cancelar" class="btn btn-danger"
                                       @if($booking->status == 1) disabled @endif>
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection

@section('reservationScript')
    <script>

        @if(session('errorMessage') == 'tableReservationError')
        Swal.fire({
            title: 'Ya hay una reserva con esta mesa para la fecha seleccionada',
            icon: 'error',
            confirmButtonColor: '#da0e1e',
        })
        @endif

        @if(session('message') == 'SuccessfulReservationCreation')
        Swal.fire({
            title: 'Solicitud de reserva realizada correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        @if(session('errorMessage') == 'reservationCancellationError')
        Swal.fire({
            title: 'No se ha podido cancelar la reserva',
            icon: 'error',
            confirmButtonColor: '#da0e1e',
        })
        @endif

        @if(session('message') == 'successfulBookingCancellation')
        Swal.fire({
            title: 'Reserva cancelada correctamente',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

        // Confirmation alert

        $('.confirmation_alert').submit(function (e) {

            e.preventDefault()

            Swal.fire({
                title: '¿Desea cancelar la reserva?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, borrar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })

    </script>
@endsection
