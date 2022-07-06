@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="text-center mb-4" style="font-family: 'Arial Rounded MT Bold', sans-serif">Productos</h1>

        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <a href="{{url('product/create')}}" class="btn btn-success">Registrar nuevo producto</a>

        <div class="mt-3 mb-3" style="overflow-x:auto;">

            <table class="table table-striped table-bordered border-dark productsTable" style="width: 100%;">

                <thead class="table text-center" style="background: #202022; color: white">

                <tr style="border-color: black">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad&nbsp;en&nbsp;stock</th>
                    <th>Cantidad&nbsp;en&nbsp;stock&nbsp;minima</th>
                    <th>Referencia</th>
                    <th>Iva</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>

                </thead>

                <tbody class="text-center">

                @foreach ($products as $product)

                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->min_stock}}</td>
                        <td>{{$product->reference}}</td>
                        <td>{{$product->iva}}</td>

                        <td>
                            <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->image}}"
                                 width="100" alt="">
                        </td>

                        <td>

                            <a href="{{url('product/edit/'.$product->id)}}" class="btn btn-primary">Editar</a>

                            <form action="{{url('/product/destroy/'.$product->id)}}" class="d-inline" method='post'>
                                @csrf
                                {{method_field('DELETE')}}
                                <input type='submit' onclick="return confirm('¿Desea borrar el producto?')" value="Borrar" class="btn btn-danger">
                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {!! $products->links() !!}

    </div>
@endsection
