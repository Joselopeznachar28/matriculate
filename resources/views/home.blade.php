<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="gradiend">
    <div class="grid-inicio">
        <!-- barra de navegacion lateral -->
        <div class="nav-lateral bg-black">
            <div class="img-logo-nav">
                <img src="" alt="logo">
            </div>
            <!-- hace referencia a Materias -->
            <a class="nav-item" data-bs-toggle="collapse" href="#Materias" aria-expanded="false" aria-controls="Materias">
                {{ __('Materias') }}
            </a>
            <!-- esta es la referencia de Materias-->
            <div class="collapse" id="Materias">
                <ul>
                    <li>
                        <a href="{{ route('subjets.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('subjets.create') }}">{{ __('Crear') }}</a>
                    </li>
                </ul>
            </div><br>
            <!-- hace referencia a Teachers-->
            <a class="nav-item" data-bs-toggle="collapse" href="#Teachers" aria-expanded="false" aria-controls="Teachers">
                {{ __('Profesores') }}
            </a>
            <!-- esta es la referencia de Teachers-->
            <div class="collapse" id="Teachers">
                <ul>
                    <li>
                        <a href="{{ route('teachers.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('teachers.create') }}">{{ __('Crear') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- barra de navegacion principal -->
        <div class="nav-principal container d-flex justify-content-end">
            <p class="text-white">{{ Auth::user()->name }}</p>
        </div>
    </div>

    @yield('content')

</body>
</html>
