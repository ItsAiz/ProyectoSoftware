@section('navbarStyles')
    <style>

    </style>
@endsection

<div class="container">
    <div class="d-flex flex-row-reverse text-white">
        <p> Carrera 11 N°12-82  Sogamoso - Boyacá</p>
    </div>
    <div class="container-fluid bg-dark">
        <ul class="nav nav-pills nav-fill">

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="/">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="{{ route('menu') }}">Menú</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="#">Nosotros</a>
            </li>

            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/home') }}">Perfil</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{ route('login') }}" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" aria-current="page" href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</a>
                        </li>
                    @endif
                @endauth

            @endif

            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Haz tu pedido</a>
            </li>
        </ul>
    </div>
</div>

