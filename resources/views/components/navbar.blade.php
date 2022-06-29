<nav class="navbar navbar-expand-md custom-nabvar">

    <div class="container">

        <a class="navbar-brand" href="#home">11&6 GASTRO-PUB</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                id="id-toggler">
            <i class="bi bi-list" id="icon-toggle"></i>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('start') ? 'link-active' : '' }}" aria-current="page"
                       href="/" id="link-home"> Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('menu') }}" id="link-menu"> Menú</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('makeOrder') ? 'link-active' : '' }}" aria-current="page"
                       href="{{ route('makeOrder') }}" id="link-pedido"> Haz tu pedido</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}" id="link-perfil"> Perfil</a>
                        </li>
                    @else

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Iniciar sesión
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="button-select dropdown-item" href="{{ route('login') }}"
                                       data-bs-toggle="modal" data-bs-target="#loginModal"> Iniciar Sesión</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                @if (Route::has('register'))
                                    <li><a class="button-select dropdown-item" href="{{ route('register') }}" data-bs-toggle="modal"
                                           data-bs-target="#registerModal">Registrarse</a></li>
                                @endif

                            </ul>
                        </li>

                    @endauth
                @endif

            </ul>

        </div>

    </div>

</nav>

@section('navbarScript')

    <script>
        /* Script para cambiar el icono del navbar */
        let iconStatus = 0;
        let toggler = document.getElementById('icon-toggle');
        toggler.addEventListener('click', changeIcon);

        function changeIcon() {

            switch (iconStatus) {

                case 0:
                    $('#icon-toggle').removeClass('bi bi-list');
                    $('#icon-toggle').addClass('bi bi-x-lg');
                    iconStatus = 1;
                    break;

                case 1:
                    $('#icon-toggle').removeClass('bi bi-x-lg');
                    $('#icon-toggle').addClass('bi bi-list');
                    iconStatus = 0;
                    break;
            }

        }

        /* Script para agregar iconos a links */
        addIcons();
        window.addEventListener('resize', addIcons);

        function addIcons() {

            $('#link-home').addClass('bi bi-house-fill');
            $('#link-menu').addClass('bi bi-book-fill');
            $('#link-pedido').addClass('bi bi-cart-fill');
            $('#navbarDropdown').addClass('bi bi-person-circle');

            if (screen.width > 768) {
                $('#link-home').removeClass('bi bi-house-fill');
                $('#link-menu').removeClass('bi bi-book-fill');
                $('#link-pedido').removeClass('bi bi-cart-fill');
                $('#navbarDropdown').removeClass('bi bi-person-circle');
            }
        }

    </script>

@endsection
