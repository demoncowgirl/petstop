<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Beth's Natural Pets @yield('title')</title>
</head>

<body src="{{ asset('assets/images/bones40.png') }}">

    @include('inc._navbar')

    @if(Request::is('petSearch'))
    @include('inc._searchContainer')
    @elseif(Request::is('vetServices'))
    @include('inc._searchContainer')
    @elseif(Request::is('serviceSearch'))
    @include('inc._centerContainer')
    <!-- @elseif(!!Request::is('login'))
    @elseif(!!Request::is('register')) -->
    @endif


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
