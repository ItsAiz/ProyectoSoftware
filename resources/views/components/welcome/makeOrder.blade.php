@extends('welcome')

@section('makeOrderStyles')
    <style>

        body {
            background: url({{asset('images/orderBackground/background.png')}});
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
            width: 80%;
            color: #ffffff;
            font-size: 15px;
            border-color: #ffffff80;
            background-color: #ffffff00;
            box-shadow: none;
        }

        .custom-product-selection-button:focus:hover {
            color: #000000;
            font-weight: 600;
            border-color: #ffc107;
            background-color: #ffc107;
            box-shadow: 0 0 15px #ffffff80;
        }

        @media (min-width: 768px) {
            .custom-menu-section {
                margin-top: 11rem;
                margin-bottom: 5.5rem;
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

                            <a href="{{url('/makeOrder/' . $category->id)}}" class="btn btn-outline-warning
                              {{ request()->path() == 'makeOrder/' . $category->id ? 'active' : '' }}"
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
                                                 class="card-img-top custom-levitation-effect" alt="Product">

                                            <div class="card-body custom-card-body">

                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <h6 class="card-title">
                                                    $ {{number_format($product->price, 0, ',', '.')}}</h6>

                                                <!-- Button modal -->
                                                <button type="button" class="btn custom-product-selection-button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#productModal{{$product->id}}">
                                                    Seleccionar
                                                </button>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <!-- Product Modal -->

                                <div class="portfolio-modal modal fade mt-5" id="productModal{{$product->id}}"
                                     tabindex="-1"
                                     aria-labelledby="portfolioModal1"
                                     aria-hidden="true">

                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content" style="background: rgba(255,255,255,0.9)">

                                            <div class="modal-body">

                                                <div class="container">

                                                    <div class="row">

                                                        <div class="col-12 col-md-6 mt-3 mb-3 rounded-3"
                                                             style="background: rgba(255,193,7,0.7);">
                                                            <img class="img-fluid mt-5 mb-5"
                                                                 src="{{asset('storage').'/'.$product->image}}"
                                                                 alt="product"/>
                                                        </div>

                                                        <div class="col-12 col-md-6">
                                                            <h1 class="text-center fw-bolder align-middle mt-3">{{$product->name}}</h1>
                                                            <h5 class="fw-bolder mt-4">Descripción:</h5>
                                                            <p>{{$product->description}}</p>
                                                            <h5 class="mt-4">Precio
                                                                unitario:&nbsp;<strong>$&nbsp;{{number_format($product->price, 0, ',', '.')}}</strong>
                                                            </h5>
                                                        </div>

                                                    </div>

                                                    <div class="row d-flex justify-content-center mt-3 mt-md-0">
                                                        <a href="{{url('/addProduct/' . $product->id)}}"
                                                           class="btn btn-warning w-50">Agregar</a>
                                                    </div>

                                                </div>
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

            <div class="col-12 col-lg-5 text-center">

                @if(session('listOfProducts') == null)
                    <img class="img-fluid" src="{{asset('images/orderBackground/bannerOrder.png')}}" width="300"
                         alt="..."/>
                @else

                    <div class="card" style="background-color: rgba(255,255,255,0.5)">

                        <div class="card-header d-flex align-items-center justify-content-center">
                            <span class="text-white fw-bolder " style="font-size: 25px;">Tu pedido</span>
                        </div>

                        <ul class="list-group list-group-flush" style="overflow-y: auto; height: 13rem;">

                            <li class="list-group-item" style="background-color: #ffc107; margin-top: 1px">

                                <div class="row">

                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">Cantidad</span>
                                    </div>

                                    <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">Producto</span>
                                    </div>

                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">Precio</span>
                                    </div>

                                    <div class="col-2 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">Acción</span>
                                    </div>

                                </div>

                            </li>

                            <li class="list-group-item" style="background-color: rgba(0,0,0,0.75); margin-top: 1px">

                                @foreach(session('listOfProducts') as $selectedProduct)

                                    <div class="row mb-2">

                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">{{$selectedProduct->stockAmount}}</span>
                                        </div>

                                        <div class="col-5 d-flex justify-content-center align-items-center">
                                                <span
                                                    class="text-center text-white fs-6">{{$selectedProduct->name}}</span>
                                        </div>

                                        <div class="col-3 d-flex justify-content-center align-items-center">
                                            <span
                                                class="text-center text-white fs-6">$&nbsp;{{number_format(($selectedProduct->stockAmount * $selectedProduct->price), 0, ',', '.')}}</span>
                                        </div>

                                        <div class="col-2 d-flex justify-content-center align-items-center">
                                            <form action="{{url('/removeProduct')}}" method="post">
                                                @method("delete")
                                                @csrf
                                                <input type="hidden" name="indice" value="{{$loop->index}}">
                                                <button type="submit" class="btn btn-danger"
                                                        style="background-color: rgba(255,0,0,0.5); color: white">
                                                    <i class="fa-solid fa-trash"> </i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>

                                @endforeach

                            </li>

                        </ul>

                        <div class="card-footer d-flex">
                            <span class="text-black fs-4 fw-bolder">
                                Total:&nbsp;${{number_format( $total, 0, ',', '.')}}
                            </span>
                        </div>

                    </div>

                @endif

            </div>

        </div>

        @if(session('listOfProducts') != null)

            <div class="container-fluid mt-5">

                <div class="col-12 col-md-5 mx-auto" style="border-style: solid; border-width: 2px; border-color: rgba(255,255,255,0);
            background: rgba(0,0,0,0.80)">

                    <div class="col-12 mx-auto">
                        <h3 class="text-center mt-4 titles-section-start text-white">Información de domicilio</h3>
                    </div>

                    <div class="col-9 mt-2 mx-auto">

                        <form class="confirmation_alert" action="{{url('/finalizeOrder')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

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
                                <label class="text-white" for="name">Nombre</label>
                                <input type="text" class="form-control" name="name"
                                       onkeydown="return /^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/i.test(event.key)"
                                       value="{{isset($name)?$name:old('name')}}">
                            </div>

                            <div class="form-group mt-2">
                                <label class="text-white" for="address">Dirección</label>
                                <input type="text" class="form-control" name="address"
                                       value="{{isset($address)?$address:old('address')}}">
                            </div>

                            <div class="form-group mt-2">
                                <label class="text-white" for="phoneNumber">Número de celular</label>
                                <input type="number" class="form-control" name="phoneNumber"
                                       min="1" pattern="^[0-9]+"
                                       value="{{isset($phoneNumber)?$phoneNumber:old('phoneNumber')}}">
                            </div>

                            <div class="mt-3 mb-3 d-flex align-items-end justify-content-center">
                                <input type="submit" class="btn btn-warning" value="Confirmar pedido">
                            </div>

                        </form>

                    </div>

                </div>

            </div>

        @endif

    </div>
@endsection

@section('makeOrderScript')
    <script>

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

        // Confirmation alert

        $('.confirmation_alert').submit(function (e) {

            e.preventDefault()

            Swal.fire({
                title: '¿Desea finalizar la orden?',
                text: "¡No podrás revertir esto!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, finalizar',
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })

        })

        @if(session('errorMessage') == 'stockError')
        Swal.fire({
            title: 'No hay más unidades de este producto',
            icon: 'error',
            confirmButtonColor: '#da0e1e',
        })
        @endif

        @if(session('message') == 'successfulDelivery')
        Swal.fire({
            title: 'Solicitud de domicilio realizada correctamente',
            text: 'Cualquier inquietud no dudes en contactarnos.',
            icon: 'success',
            confirmButtonColor: '#199605',
        })
        @endif

    </script>

@endsection
