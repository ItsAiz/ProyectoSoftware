@extends('welcome')

@section('menu')
    <section id="inicio mt-5">

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{asset('images/slider/s1.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bebidas</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{asset('images/slider/s2.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Hamburguesas</h5>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="{{asset('images/slider/s3.png ')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Picadas</h5>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>

    </section>

    <section id="productos" class="bg-secondary text-light border"
             style="border-color: rgba(255,255,255,0) !important;">

        <div class="container">

            <h2 class="text-center display-4 mt-5">Productos</h2>

            <p class="text-center h2 pb-5">
                Descarga nuestro menú y conoce todos nuestros productos.
            </p>

            <div class="row text-dark text-center">

                <div class="col-8 col-md-4 mb-5 mx-auto">
                    <img src="{{asset('images/product/p1.png')}}" class="img-fluid" alt="Responsive image">
                </div>

                <div class="col-8 col-md-4 mb-5 mx-auto">
                    <img src="{{asset('images/product/p2.jpg')}}" class="img-fluid" alt="Responsive image">
                </div>

                <div class="col-8 col-md-4 mb-5 mx-auto">
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
