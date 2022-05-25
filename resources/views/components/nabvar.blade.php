<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; left: 0; top: 0; width: 100%; z-index: 1000">

    <div class="container-fluid">

        <a class="navbar-brand" href="#" style="color: #ffc107">11&6</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('menu') ? 'active' : '' }}" aria-current="page" href="{{ route('menu') }}">Menú</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Nosotros</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Perfil</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('login') }}" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('register') }}" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</a>
                            </li>
                    @endif
                @endauth

            @endif

            </ul>

        </div>

    </div>

</nav>
