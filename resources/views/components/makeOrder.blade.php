@extends('welcome')

@section('makeOrderStyles')
    <style>

        body {
            background: url({{asset('images/wallpapers/prueba6.png')}});
            overflow-x: hidden;
        }

        .custom-menu-section {
            margin-top: 6rem;
            margin-bottom: 6rem;
        }

        .custom-product-selection-button {
            width: 80%;
            color: #ffffff;
            font-size: 15px;
            border-color: #ffffff80;
            background-color: #ffffff00;
        }

        .custom-product-selection-button:hover {
            color: #000000;
            font-weight: 600;
            border-color: #ffc107;
            background-color: #ffc107;
        }

        .custom-product-selection-button:focus {
            color: #000000;
            font-weight: 600;
            border-color: #ffc107;
            background-color: #ffc107;
            box-shadow: 0 0 15px #ffffff80;
        }

        @media (min-width: 768px) {
            .custom-menu-section {
                margin-top: 11rem;
                margin-bottom: 6rem;
            }
        }

        .custom-products-section {
            margin-top: 1rem;
        }

        .custom-carousel-item-content {
            display: flex;
            justify-content: center;
        }

        .custom-card {
            width: 15rem;
            margin: 0.3rem;
            border: none;
            background-color: #ffffff00;
        }

        .custom-levitation-effect {
            transform: translateY(0px);
            transition: transform 0.5s;
        }

        .custom-levitation-effect:hover {
            transform: translateY(-8px);
        }

        .custom-card-body {
            text-align: center;
        }

        .custom-card-body h5 {
            color: #ffffff;
        }

        .custom-card-body h6 {
            color: #FFFFFFBF;
        }

        .custom-product-selection-button {
            width: 80%;
            color: #ffffff;
            font-size: 15px;
            border-color: #ffffff80;
            background-color: #ffffff00;
        }

        .custom-product-selection-button:hover {
            color: #000000;
            font-weight: 600;
            border-color: #ffc107;
            background-color: #ffc107;
        }

        .custom-product-selection-button:focus {
            color: #000000;
            font-weight: 600;
            border-color: #ffc107;
            background-color: #ffc107;
            box-shadow: 0 0 15px #ffffff80;
        }

        .custom-products-section {
            position: relative;

        }

        .custom-carousel-inner {
            padding: 1em;
        }

        .custom-carousel-control-prev,
        .custom-carousel-control-next {
            top: 50%;
            width: 7vh;
            height: 7vh;
            background-color: #e1e1e1;
            transform: translateY(-50%);
        }

        .custom-carousel-control-prev:hover,
        .custom-carousel-control-next:hover {
            background-color: #ffc107;
        }

        @media (min-width: 576px) {
            .custom-carousel-item {
                margin-right: 0;
                flex: 0 0 50%;
                display: block;
            }

            .custom-carousel-inner {
                display: flex;
            }
        }

        @media (min-width: 1200px) {
            .custom-carousel-item {
                margin-right: 0;
                flex: 0 0 33.33%;
                display: block;
            }

            .custom-carousel-inner {
                display: flex;
            }
        }

    </style>
@endsection

@section('makeOrder')
    <div class="container-fluid custom-menu-section">

        <div class="row">

            <div class="col-12 col-lg-7">

                <!-- Categorías de los productos  -->

                <div class="row" style="overflow-x: auto;">

                    <div class="btn-group">

                        @foreach(\App\Models\Category::all() as $category)

                            <a href="{{url('/makeOrder/' . $category->id)}}  " class="btn btn-outline-warning"
                               aria-current="page" style="font-size: 18px; white-space: nowrap;">
                                {{$category->name}}
                            </a>

                        @endforeach

                    </div>

                </div>

                <!-- Carrusel de los productos -->

                <div class="row custom-products-section">

                    <div id="carouselExampleControls" class="carousel" data-bs-ride="false">

                        <div class="carousel-inner custom-carousel-inner">

                            @foreach($products as $product)

                                <div
                                    class="carousel-item custom-carousel-item @if($product == $products[0]) active @endif">

                                    <div class="custom-carousel-item-content">

                                        <div class="card custom-card">

                                            <img src="{{asset('storage').'/'.$product->image}}"
                                                 class="card-img-top custom-levitation-effect"
                                                 alt="Product"
                                            >

                                            <div class="card-body custom-card-body">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <h6 class="card-title">{{$product->price}}</h6>
                                                <a href="{{url('/category/' . $product->id)}}" class="btn custom-product-selection-button">Seleccionar</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                        <button class="carousel-control-prev custom-carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next custom-carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>

                </div>

            </div>

            <!-- Panel de pedido -->

            <div class="col-12 col-lg-5">

                <div class="card" style="background-color: rgba(255,255,255,0.5)">
                    <div class="card-header d-flex justify-content-center">
                        <h2 style="color: white">Tu pedido</h2>
                    </div>

                    <ul class="list-group list-group-flush" style="overflow-y: auto; height: 17rem;">
                        @for($i=0; $i<10; $i++)
                            <li class="list-group-item" style="background-color: rgba(0,0,0,0.75); margin-top: 1px">

                                <div class="row">

                                    <div class="col-3 col-xl-2">

                                        <select class="form-select" aria-label="Default select example">
                                            @for($j=1; $j<6; $j++)
                                                <option value="1">{{$j}}</option>
                                            @endfor
                                        </select>

                                    </div>

                                    <div class="col-3 col-sm-4" style="text-align: center">
                                        <h6 style="color: white">Hamburguesa triple especial</h6>
                                    </div>

                                    <div class="col-4 col-sm-3" style="text-align: center">
                                        <h6 style="color: white">$15.0000</h6>
                                    </div>

                                    <div class="col-2 col-sm-2" style="text-align: center">
                                        <a class="btn btn-danger" href="#"
                                           style="background-color: rgba(255,0,0,0.5); color: white">
                                            <i class="fa-solid fa-trash"> </i>
                                        </a>
                                    </div>

                                </div>

                            </li>
                        @endfor
                    </ul>

                    <div class="card-footer text-muted text-center">
                        <a href="#" class="btn btn-warning" style="width: 8rem">Continuar</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection


@section('makeOrderScript')
    <script>

        window.addEventListener("resize", function () {
            this.location.reload()
        })

        let multipleCardCarousel = document.querySelector("#carouselExampleControls");

        if (window.screen.width >= 576 || window.screen.width >= 1200) {

            new bootstrap.Carousel(multipleCardCarousel, {interval: false,});
            let carouselWidth = $(".carousel-inner")[0].scrollWidth;
            let cardWidth = $(".carousel-item").width();
            let scrollPosition = 0;

            $("#carouselExampleControls .carousel-control-next").on("click", function () {

                if (window.screen.width >= 576 && window.screen.width < 1200) {
                    if (scrollPosition < carouselWidth - cardWidth * 3) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 750);
                    }
                }

                if (window.screen.width >= 1200) {

                    $(multipleCardCarousel).removeClass("slide")

                    if (scrollPosition < carouselWidth - cardWidth * 4) {
                        scrollPosition += cardWidth;
                        $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                    }
                }

            });

            $("#carouselExampleControls .carousel-control-prev").on("click", function () {

                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    $("#carouselExampleControls .carousel-inner").animate({scrollLeft: scrollPosition}, 600);
                }
            });

        } else if (window.screen.width < 576) {
            $(multipleCardCarousel).addClass("slide");
        }

    </script>
@endsection
