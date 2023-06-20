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
<body>
    <div class="grid-inicio">
        <!-- barra de navegacion lateral -->
        <div class="nav-lateral d-grid">
            <div class="img-logo-nav">
                <img src="{{ asset('img/logo.png') }}" alt="logo">
            </div>
            <a href="{{ route('home') }}">Dashboard</a>
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
            </div>
            <!-- hace referencia a sections-->
            <a class="nav-item" data-bs-toggle="collapse" href="#sections" aria-expanded="false" aria-controls="sections">
                {{ __('Secciones') }}
            </a>
            <!-- esta es la referencia de Teachers-->
            <div class="collapse" id="sections">
                <ul>
                    <li>
                        <a href="{{ route('sections.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('sections.create') }}">{{ __('Crear') }}</a>
                    </li>
                </ul>
            </div>
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
            <!-- hace referencia a Students-->
            <a class="nav-item" data-bs-toggle="collapse" href="#Students" aria-expanded="false" aria-controls="Students">
                {{ __('Estudiantes') }}
            </a>
            <!-- esta es la referencia de Teachers-->
            <div class="collapse" id="Students">
                <ul>
                    <li>
                        <a href="{{ route('students.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('students.create') }}">{{ __('Crear') }}</a>
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
