@extends('layouts.app')

@section('content')

    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('booking/store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <h1 class="text-center mt-md-5" style="font-family: 'Arial Rounded MT Bold', sans-serif">
                    Crear reserva
                </h1>

                @if(session('errorMessage'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{session('errorMessage')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(count($errors)>0)

                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="bookingDate">Día de la reserva</label>
                    <input class="form-control" type="date" min="<?php echo date("Y-m-d"); ?>"
                           value="{{isset($booking->bookingDate)?$booking->bookingDate:old('bookingDate')}}"
                           name="bookingDate" required>
                </div>

                <div class="form-group mt-3">
                    <label for="bookingHour">Hora de la reserva</label>
                    <div class="input-group clockpicker" data-autoclose="true">
                        <input type="text" class="form-control" name="bookingHour" required readonly
                               value="{{isset($booking->bookingHour)?$booking->bookingHour:old('bookingHour')}}">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" name="description"
                           value="{{isset($booking->description)?$booking->description:old('description')}}">
                </div>

                <div class="form-group mt-3">
                    <label for="category_id">Mesa</label>
                    <select class="form-select form-control" name="restaurant_table_id">
                        @foreach(\App\Models\RestaurantTable::all() as $item)
                            <option
                                value="{{ $item->id }}">Mesa: {{$item->id}} - Sillas: {{$item->chairNumbers}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 mb-5">
                    <input type="submit" class="btn btn-success" value="Crear reserva">
                    <a class="btn btn-primary" href="{{url('booking')}}">Regresar</a>
                </div>

            </form>

        </div>

    </div>

@endsection

@section('bookingScript')
    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
@endsection
