@extends('welcome')

@section('startStyles')

    <style>

        .custom-start-section {
            margin-top: calc(1rem + 60px);
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
            background-color: #eea520;
        }

        .titles-section-start {
            font-family: "Arial Rounded MT Bold", sans-serif;
        }

        .custom-form:focus {
            box-shadow: 0 0 15px rgba(255, 255, 255, 0);
            border-color: black;
        }

        @media (max-width: 768px) {
            .text-ubication {
                display: none;
            }

            .text-home-parraf {
                display: none;
            }

            .title-special {
                font-size: 2.5rem;
                color: #eea520;
            }
        }

        @media (min-width: 768px) {
            .text-home {
                display: none;
            }

            .title-special {
                font-size: 4rem;
                color: #eea520;
            }
        }

    </style>

@endsection


@section('start')

    <section class="wallpaper w-Color-One d-flex align-items-center" id="home">

        <div class="container custom-start-section">

            <div class="row">

                <div class="col-12 col-md-8">

                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active" data-bs-interval="2000">
                                <img src="{{asset('images/carousel/1.jpg')}}" class="d-block w-100" alt="...">
                            </div>

                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{asset('images/carousel/2.png')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="4000">
                                <img src="{{asset('images/carousel/3.jpg')}}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="{{asset('images/carousel/4.png')}}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev custom-carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleInterval"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next custom-carousel-control-next" type="button"
                                data-bs-target="#carouselExampleInterval"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <div
                    class="col-12 col-md-4 mt-5 mt-md-0 d-flex justify-content-center align-items-center"
                    style="background: rgba(0,0,0,0.80)">

                    <h3 class=" text-home text-white text-center p-2">
                        Un lugar para compartir...
                    </h3>

                    <p class="text-home-parraf text-white text-center p-2">
                        Ven y disfruta nuestros excelentes <span
                            style="color:#eea520; font-size:19px; font-weight: bolder;">productos gastronómicos</span>.
                        Desayunos - almuerzos - comidas
                        rápidas - salón de onces - cafetería fría y caliente en el corazón de Sogamoso. Sin duda alguna
                        uno de los mejores lugares en el cual puedes departir con amigos, familia y relacionarte con
                        grandes personas. Déjate atender con el mejor servicio y obtén deliciosos y espectaculares
                        productos. Te esperamos.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <section class="wallpaper w-Color-Two d-flex align-items-center" id="">

        <div class="container">

            <div class="col-12">
                <h1 class="title-special titles-section-start text-center">Populares +3</h1>
            </div>

            <div class="row" style="margin-top: 7rem;">

                <div class="col-6 col-md-3 mx-auto">
                    <img src="{{asset('storage').'/'.$products[0]->image}}"
                         class="img-thumbnail rounded-circle img-fluid custom-levitation-effect" alt=""
                         id="mainImgSpecial">
                    <h3 class="text-white text-center mt-2">{{$products[0]->name}}</h3>
                </div>

                <div class="col-6 col-md-3 mx-auto">
                    <img src="{{asset('storage').'/'.$products[1]->image}}"
                         class="img-thumbnail rounded-circle img-fluid custom-levitation-effect" alt=""
                         id="mainImgSpecial">
                    <h3 class="text-white text-center mt-2">{{$products[1]->name}}</h3>
                </div>

                <div class="col-6 col-md-3 mx-auto">
                    <img src="{{asset('storage').'/'.$products[2]->image}}"
                         class="img-thumbnail rounded-circle img-fluid custom-levitation-effect" alt=""
                         id="mainImgSpecial">
                    <h3 class="text-white text-center mt-2">{{$products[2]->name}}</h3>
                </div>

            </div>

        </div>

    </section>

    <div class="container-fluid d-flex align-items-center justify-content-center"
         style="height: 5rem;
         background-color: #eea520;
         color: black;">

        <h1 class="text-center titles-section-start">
            Para ver más productos ingresa a nuestro
            <a aria-current="page" href="{{ route('menu') }}" id="link-menu" style="color: white;"> Menú </a>
        </h1>
    </div>

    <section class="wallpaper w-Color-Three d-flex align-items-center">

        <div class="container">

            <div class="row">
                <h1 class="titles-section-start text-white">Conoce nuestra ubicación</h1>
            </div>

            <div class="row mt-4 mt-md-5">

                <div class="col-12 col-md-4 d-flex justify-content-center align-items-center"
                     style="background: rgba(255,255,255,0.60)">

                    <p class="text-ubication text-center text-black p-2">
                        <span style="color: black; font-weight: bolder;">11y6 Gastro Pub </span>
                        es un espacio diferente en Sogamoso Boyaca, encontrarás servicio de café,
                        restaurante y Bar, manejamos productos de óptima Calidad, con personas capacitadas en atención y
                        servio al cliente, incorporamos espacios para que disfrutes de tus mejores momentos en familia,
                        con amigos o para la ocasión deseada. Esperamos tu visita en la Carrera 11 N° 12-82
                        Sogamoso,Boyacá.
                    </p>
                </div>

                <div class="col-12 col-md-8 d-flex align-items-center">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.9779844052932!2d-72.92967028573527!3d5.71630923360688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6a45dc0339123f%3A0x8b4deae43f28f658!2s11y6%20GASTRO%20PUB!5e0!3m2!1ses!2sco!4v1655887067536!5m2!1ses!2sco"
                        width="100%" height="450px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

            </div>

        </div>

    </section>

    <section class="wallpaper w-Color-One d-flex align-items-center" id="contact">

        <div class="container-fluid">

            <div class="col-11 col-md-5 mx-auto" style="border-style: solid; border-width: 2px; border-color: rgba(255,255,255,0);
            background: rgba(0,0,0,0.80)">

                <div class="col-12 mx-auto">
                    <h1 class="text-center mt-4 titles-section-start text-white">Envíanos un mensaje</h1>
                </div>

                <div class="col-11 mt-5 mx-auto">

                    <form action="{{url('/sendMessage')}}" method="post" enctype="multipart/form-data">
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

                        <div class="form-group mb-4">
                            <label class="text-white fs-5 mb-2 w-100" for="name">Nombre
                                <input type="text" class="form-control custom-form" name="name">
                            </label>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-white fs-5 mb-2 w-100" for="email">Correo
                                <input type="email" class="form-control custom-form" name="email">
                            </label>
                        </div>

                        <div class="form-group mb-4">
                            <label class="text-white fs-5 mb-2 w-100" for="message">Mensaje
                                <textarea type="text" class="form-control custom-form" name="message"
                                          style="height: 7rem; min-height: 7rem; max-height: 7rem;">
                                </textarea>
                            </label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-warning btn-block mb-4 custom-main-button">Enviar
                            </button>
                        </div>

                    </form>

                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show mt-2">
                            {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </section>

@endsection
