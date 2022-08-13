@extends('welcome')

@section('menu')
    <section id="inicio">

        <div style="border-style: solid; border-width: 1px; border-color: rgba(0,0,0,0.8);">

            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1"
                            aria-label="Slide 2">
                    </button>
                </div>

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{asset('images/slider/s1.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>HAMBURGUESAS</h2>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('images/slider/s2.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h2>PICADAS</h2>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="wallpaper w-Color-Two">

        <div class="container">

            <br>

            <h2 class="display-4 text-center text-white mt-0 mt-md-5">Productos</h2>

            <p class="text-center text-white h2 pb-5">
                Descarga nuestro menú y conoce todos nuestros productos.
            </p>

            <div class="row text-dark text-center">

                <div class="col-6 col-md-4 mb-5 mx-auto">
                    <img src="{{asset('images/product/p1.png')}}" class="img-fluid" alt="Responsive image">
                </div>

                <div class="col-6 col-md-4 mb-5 mx-auto">
                    <img src="{{asset('images/product/p2.jpg')}}" class="img-fluid" alt="Responsive image">
                </div>

                <div class="col-6 col-md-4 mb-5 mx-auto">
                    <img src="{{asset('images/product/p3.jpg')}}" class="img-fluid" alt="Responsive image">
                </div>

            </div>

        </div>

        <div class=" container text-center mb-3">
            <form action="{{url('/downloadMenu')}}" class="d-inline" method='post'>
                @csrf
                {{method_field('POST')}}
                <input type='submit' value="Descargar Menú" class="btn btn-success">
            </form>
        </div>

    </section>
@endsection
