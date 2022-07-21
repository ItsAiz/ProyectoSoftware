@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Empleados</h1>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{url('employee/create')}}" class="btn btn-success">Registrar nuevo empleado</a>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Tipo Documento</th>
                    <th>Nro. Documento</th>
                    <th>Nro. Celular</th>
                    <th>Dirección</th>
                    <th>Fecha Contratación</th>
                    <th>Salario</th>
                    <th>ID Usuario</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($employees as $employee)

                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->lastName}}</td>
                        <td>{{$employee->documentType}}</td>
                        <td>{{$employee->documentNumber}}</td>
                        <td>{{$employee->phoneNumber}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->hiringDate}}</td>
                        <td>{{$employee->salary}}</td>
                        <td>{{$employee->idUser}}</td>
                        <td>

                            <a href="{{url('employee/edit/'.$employee->id)}}" class="btn btn-primary">Editar</a>
                            <form action="{{url('/employee/destroy/'.$employee->id)}}" class="d-inline" method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' onclick="return confirm('¿Desea borrar el empleado indicado?')" value="Borrar" class="btn btn-danger">
                            </form>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {!! $employees->links() !!}

    </div>
@endsection
