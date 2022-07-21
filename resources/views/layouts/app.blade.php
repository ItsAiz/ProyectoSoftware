<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Title -->
    <title>11&6 GASTRO PUB</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboardStyles.css') }}" rel="stylesheet">

</head>

<body id="body" class="body_move">

<div id="app">

    <header>

        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>

        <div class="user__navbar">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-black" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        @if(Auth::user()->rol->description == 'administrator')
                            Administrador
                        @elseif(Auth::user()->rol->description == 'employee')
                            <span>Empleado</span>
                        @else
                            {{ Auth::user()->client->name }}
                        @endif

                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('start') }}">
                            <i class="fa-regular fa-file-lines"></i> Página principal
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>

                </li>

            </ul>

        </div>

    </header>

    <div class="menu__side menu__side_move" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-star"></i>
            <span>Gastro&nbsp;Pub</span>
        </div>

        <div class="container" style="margin-left: 10px;">
            <div style="width: auto; border-style: solid; border-top: 2px; border-color: rgba(255,255,255,0.7);"></div>
        </div>

        <div class="options__menu">

            <a href="{{ route('home') }}" class="{{request()->routeIs('home') ? 'selected' : ''}}">
                <div class="option">
                    <i class="fas fa-home"></i>
                    @if(Auth::user()->rol->description == 'administrator')
                        <span>Administrador</span>
                    @elseif(Auth::user()->rol->description == 'employee')
                        <span>Empleado</span>
                    @else
                        <span>Cliente</span>
                    @endif
                </div>
            </a>

            <!-- Admin -->

            @if(Auth::user()->rol->description == 'administrator')

                <a href="{{ route('product/management') }}"
                   class="{{request()->routeIs('product/management') ? 'selected' : ''}}">
                    <div class="option">
                        <i class="fa-solid fa-burger"></i>
                        <span>Gestión&nbsp;productos</span>
                    </div>
                </a>

                <a href="{{ route('employee/management') }}"
                   class="{{request()->routeIs('employee/management') ? 'selected' : ''}}">
                    <div class="option">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Gestión&nbsp;empleados</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-users"></i>
                        <span>Gestión&nbsp;clientes</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-book"></i>
                        <span>Gestión&nbsp;reservas</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Gestión&nbsp;domicilios</span>
                    </div>
                </a>

            @endif

            @if(Auth::user()->rol->description == 'employee')

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Datos&nbsp;personales</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-book"></i>
                        <span>Gestión&nbsp;reservas</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Gestión&nbsp;domicilios</span>
                    </div>
                </a>

            @endif

            @if(Auth::user()->rol->description == 'client')

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span>Solicitar&nbsp;domicilio</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-bell-concierge"></i>
                        <span>Solicitar&nbsp;reservas</span>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-book-open"></i>
                        <span>Historial&nbsp;actividades</span>
                    </div>
                </a>

            @endif

        </div>

    </div>

    <main class="py-4">
        @yield('content')
    </main>

</div>

<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/dashboardScript.js')}}"></script>

</body>
</html>
