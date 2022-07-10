@extends('layouts.app')

@section('content')

    <div class="container border">

        <div class="col-11 col-md-6 mx-auto">

            <form action="{{url('/employee/update/'.$employee->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                @include('components.employee.form', ['mod'=>'Editar'])
            </form>

        </div>

    </div>

@endsection
