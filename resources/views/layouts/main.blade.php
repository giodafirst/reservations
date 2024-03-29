<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" />
    <!-- Scripts -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.dropotron.min.js')}}"></script>
    <script src="{{ asset('assets/js/browser.min.js')}}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js')}}"></script>
    <script src="{{ asset('assets/js/util.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <title>Projet réservations - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="no-sidebar is-preload">
    <div id="page-wrapper">
        @include('partials.menu')
        <div class="wrapper flex justify-end">
            
            <div class="container" id="main">
                @yield('content')
            </div>
        </div>
    </div> 
    @include('partials.footer')
   
</body>
</html>
