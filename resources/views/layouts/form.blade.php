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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
            <img src="{{ asset('img/logo.png') }}" alt="Logo"  height="100" class="d-inline-block align-text-top">
        <div class="container d-flex justify-content-evenly" id="accordionExample">
            <div class="accordion-item">
                <a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
            </div>
            <div class="accordion-item">
                <!-- hace referencia a Periodos Academicos -->
                <a class="nav-item" data-bs-toggle="collapse" href="#AcademicPeriod" aria-expanded="false" aria-controls="AcademicPeriod">
                    {{ __('Periodos Academicos') }}
                </a>
                <!-- esta es la referencia de Periodos Academicos-->
                <div class="collapse" id="AcademicPeriod">
                    <li>
                        <a href="{{ route('academic_period.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('academic_period.create') }}">{{ __('Crear') }}</a>
                    </li>
                </div>
            </div>
            <div class="accordion-item">
                <!-- hace referencia a Materias -->
                <a data-bs-toggle="collapse" href="#Materias" aria-expanded="false" aria-controls="Materias">
                    {{ __('Materias') }}
                </a>
                <!-- esta es la referencia de Materias-->
                <div class="collapse" id="Materias">
                    <li>
                        <a href="{{ route('subjets.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('subjets.create') }}">{{ __('Crear') }}</a>
                    </li>
                </div>
            </div>
            <div class="accordion-item">
                <!-- hace referencia a sections-->
                <a class="nav-item" data-bs-toggle="collapse" href="#sections" aria-expanded="false" aria-controls="sections">
                   {{ __('Secciones') }}
               </a>
               <!-- esta es la referencia de Teachers-->
               <div class="collapse" id="sections">
                    <li>
                        <a href="{{ route('sections.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('sections.create') }}">{{ __('Crear') }}</a>
                    </li>
               </div>
            </div>
            <div class="accordion-item">
                <!-- hace referencia a Teachers-->
                <a class="nav-item" data-bs-toggle="collapse" href="#Teachers" aria-expanded="false" aria-controls="Teachers">
                    {{ __('Profesores') }}
                </a>
                <!-- esta es la referencia de Teachers-->
                <div class="collapse" id="Teachers">
                    <li>
                        <a href="{{ route('teachers.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('teachers.create') }}">{{ __('Crear') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('teachers.asigneSubjectToTeacherView') }}">{{ __('Asignacion de Materias') }}</a>
                    </li>
                </div>
            </div>
            <div class="accordion-item">
                <!-- hace referencia a Students-->
                <a class="nav-item" data-bs-toggle="collapse" href="#Students" aria-expanded="false" aria-controls="Students">
                    {{ __('Estudiantes') }}
                </a>
                <!-- esta es la referencia de Students-->
                <div class="collapse" id="Students">
                    <li>
                        <a href="{{ route('students.index') }}">{{ __('Listado') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('students.create') }}">{{ __('Crear') }}</a>
                    </li>
                </div>
            </div>
            <div class="accordion-item">
                <a href="{{ route('notes.index') }}">{{ __('Notas') }}</a>
            </div>
            <div class="accordion-item">
                <a href="{{ route('student_records.index') }}">{{ __('Inscripciones') }}</a>
            </div>
            <div class="accordion-item">
                <a class="nav-item" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
            </div>
            
            <div class="accordion-item navbarDiv">
                <a id="navbarDropdown" class="nav-item" href="#Logout" data-bs-toggle="collapse" aria-controls="Logout" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="collapse dropdown-menu-end" aria-labelledby="navbarDropdown" id="Logout">
                    <a class="nav-item text-dark" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
</body>
</html>
