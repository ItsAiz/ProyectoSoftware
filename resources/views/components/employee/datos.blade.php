@extends('layouts.app')
@section('content')
    <div class="col-11 col-md-6 mx-auto">
<h1 class="text-center mt-md-5" style="font-family: 'Arial Rounded MT Bold', sans-serif">
    Datos Personales
</h1>

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
    <label for="name">Nombres</label>
    <input type="text" class="form-control" name="name" value="{{$employee->name}}" disabled>
</div>

<div class="form-group">
    <label for="lastName">Apellidos</label>
    <input type="text" class="form-control" name="lastName" value="{{$employee->lastName}}" disabled>
</div>

<div class="form-group mt-3">
    <label for="documentType">Tipo de documento</label>
    <input type="text" class="form-control" name="documentType" value="{{$employee->documentType}}"disabled>
</div>

<div class="form-group mt-3">
    <label for="documentNumber">Nro. Documento</label>
    <input type="number" class="form-control" name="documentNumber" value="{{$employee->documentNumber}}"disabled>
</div>

<div class="form-group mt-3">
    <label for="phoneNumber">Nro. Celular</label>
    <input type="number" class="form-control" name="phoneNumber" value="{{$employee->phoneNumber}}"disabled>
</div>

<div class="form-group">
    <label for="address">Dirección</label>
    <input type="text" class="form-control" name="address" value="{{$employee->address}}"disabled>
</div>

<div class="form-group mt-3">
    <div class="container">
        <label for="hiringDate" class="form-label">Fecha Contratación</label>
    </div>
    <div class="col-auto">
        <input class="form-control form-control-sm" type="date"  value="{{$employee->hiringDate}}" name="hiringDate"disabled>
    </div>
</div>

<div class="form-group mt-3">
    <label for="salary">Salario</label>
    <input type="number" class="form-control" name="salary" value="{{$employee->salary}}" disabled>
</div>
    </div>
@endsection
