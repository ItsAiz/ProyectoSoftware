<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if(session('download.in.the.next.request'))
        <meta http-equiv="refresh" content="0;url=http://127.0.0.1:8000/downloadBill">
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- Title -->
    <title>11&6 GASTRO PUB</title>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/globalStyles.css') }}" rel="stylesheet">

    <!-- Style sections -->
    @yield('startStyles')
    @yield('makeOrderStyles')

</head>

<body>

<!-- NAVBAR -->
@include('components.welcome.navbar')
@include('components.welcome.login')
@include('components.welcome.register')

<!-- CONTENT -->
@yield('start')
@yield('menu')
@yield('makeOrder')

<!-- FOOTER -->
@include('components.welcome.footer')

<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    window.addEventListener( "pageshow", function ( event ) {
        let historyTraversal = event.persisted ||
            ( typeof window.performance != "undefined" &&
                window.performance.navigation.type === 2 );
        if ( historyTraversal ) {

            window.location.reload();
        }
    });
</script>

<!-- Script sections -->
@yield('navbarScript')
@yield('loginScript')
@yield('registerScript')
@yield('startScript')
@yield('makeOrderScript')

</body>

</html>
