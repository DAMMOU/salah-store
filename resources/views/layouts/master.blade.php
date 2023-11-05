<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lafac Store">
    <meta name="author" content="Youssef DAMMOU">

    <title>Salah Store - Boutique en ligne</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset("lafac-store/images/lafac-store-logo.png")}}">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/templatemo-pod-talk.css')}}" rel="stylesheet">
    
    
    
    
    <!-- TemplateMo 584 Pod Talk

    https://templatemo.com/tm-584-pod-talk

    -->
    </head>

    <body>
        <main>
            @include('components.user.nav-bar')
            @yield('content')
            @include('components.user.footer')

        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{URL::asset('js/custom.js')}}"></script>
         <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

        
        

    </body>

</html>