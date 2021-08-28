<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- indicate mobile friendly page-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- change status bar color on supported mobile browsers -->
    <meta name="theme-color" content="#252A51">
    <!-- change the page's icon in the browser's tab -->
    <link rel="icon" href="{{ config('app.logo') }}">
    <!-- CSRF Token for Laravel's forms -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title --}}
    <title>{{ config('app.name', 'Urán') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;1,300;1,400;1,600&display=swap" rel="stylesheet">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="{{ mix('css/materialize.css') }}">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.1.0-alpha/dist/js/materialize.min.js"></script>
    {{-- Custom js and css --}}
    <link rel="stylesheet" src="css/app.js">   
    <script type="text/javascript" src="js/app.js"></script>
    <script>
        $(document).ready(
            function() {
                /* Init materialize components */
                $('.sidenav').sidenav();
                $('.collapsible').collapsible();
                $('.tooltipped').tooltip();
            }
        );
    </script>

</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <div class="row">
        <div class="container">
            <div class="col s12 m12 l11 offset-xl2 offset-l3">
                @yield('content')
            </div>
        </div>
    </div>
     {{-- basic toast notification --}}
     @if (session('message'))
     <script>
         M.toast({html: "{{ session('message') }}"});
     </script>
    @endif
</body>

</html>
