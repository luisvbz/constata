<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Constata | @yield('title', 'Inicio')</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Lato:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('dashboard/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body style="background-color:#ccc;">

        <div class="navbar-constata">
            <div class="left">
                <img src="/logo.png" style=" height: 50px;"/>
            </div>
            <div class="right">
                
            </div>
        </div>
        <div class="container-fluid general-container">
                @yield('content')
        </div>

@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
<script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script rel="stylesheet" src="{{ asset('js/livewire/components/pdf-viewer.js') }}"></script>

@stack('js')
</body>

</html>