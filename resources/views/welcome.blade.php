<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Schoolbell' rel='stylesheet'>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.scss') }}" rel="stylesheet">

    <style>
        body{
            opacity: 10;
            background: url({{asset('images/tot_fond.jpg')}});
            overflow-x: hidden;
            backdrop-filter: blur(7px);
            font-family: 'Schoolbell', serif;font-size: 22px;
        }
    </style>
    @yield('menuStyles')

</head>
<body>

<!-- NABVAR -->
@include('components.nabvar')
@include('components.login')
@include('components.register')

<!-- CONTENT -->
@yield('start')
@yield('menu')

<!-- FOOTER -->
@include('components.footer')

<!-- Scripts -->
<script src="{{asset('js/app.js')}}"></script>

@yield('loginScript')
@yield('registerScript')
@yield('menuScript')
</body>

</html>
