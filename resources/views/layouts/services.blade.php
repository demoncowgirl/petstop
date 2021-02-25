<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <!-- <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" > -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" >
    <script defer src="{{ mix('js/app.js') }}"></script>

    <title>Beth's PetStop @yield('title')</title>
</head>
    @include('inc._navbar')
<body>
    <div id="services" class="container-fluid">

      @if(Route::has('petSearch'))
      @include('inc._searchContainer')

      @elseif(Route::has('vetServices'))
      @include('inc._searchContainer')

      @elseif(Route::has('serviceSearch'))
      @include('inc._centerContainer')
      <!-- @elseif(!!Request::is('login'))
      @elseif(!!Request::is('register')) -->
      @endif

      @yield('content')

  </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</body>
</html>
