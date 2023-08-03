<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Matriculate') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="grid-inicio">
        <!-- barra de navegacion lateral -->
        <div class="nav-lateral d-grid">
            @foreach (Auth::user()->roles as $role)
                @if ($role->name == 'Teacher')   
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="300px" height="300px">
                @else
                    <div class="img-logo-nav">
                        <img src="{{ asset('img/logo.png') }}" alt="logo">
                    </div>
                @endif
            @endforeach 
            @can('users.index')
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endcan
            @can('charge_academic')    
                @foreach (Auth::user()->roles as $role)
                    @if ($role->name == 'Teacher')
                        <div style="height: 50px;">
                            <a href="{{ route('academic_charge.index') }}" class="nav-item">Carga Academica</a>
                        </div>
                    @else
                        <a href="{{ route('academic_charge.index') }}" class="nav-item">Carga Academica</a>
                    @endif
                @endforeach 
            @endcan
            @can('academic_period.index')
                <!-- hace referencia a Periodos Academicos -->
                <a class="nav-item" data-bs-toggle="collapse" href="#AcademicPeriod" aria-expanded="false" aria-controls="AcademicPeriod">
                    {{ __('Periodos Academicos') }}
                </a>
                <!-- esta es la referencia de Periodos Academicos-->
                <div class="collapse" id="AcademicPeriod">
                    <ul>
                        <li>
                            <a href="{{ route('academic_period.index') }}">{{ __('Listado') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('academic_period.create') }}">{{ __('Crear') }}</a>
                        </li>
                    </ul>
                </div>
            @endcan
            @can('lapso_schools.index')
                <!-- lapsos -->
                <a class="nav-item" href="{{ route('lapso_schools.index') }}">
                    {{ __('Lapsos Academicos') }}
                </a>
                <!-- hace referencia a Materias -->
                <a class="nav-item" data-bs-toggle="collapse" href="#Materias" aria-expanded="false" aria-controls="Materias">
                    {{ __('Materias') }}
                </a>
            @endcan
            @can('subjects.index')
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
            @endcan
            @can('sections.index')
                <!-- hace referencia a sections-->
                <a class="nav-item" data-bs-toggle="collapse" href="#sections" aria-expanded="false" aria-controls="sections">
                    {{ __('Secciones') }}
                </a>
                <!-- esta es la referencia de sections-->
                <div class="collapse" id="sections">
                    <ul>
                        {{-- <li>
                            <a href="{{ route('sections.index') }}">{{ __('Listado') }}</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('sections.create') }}">{{ __('Crear') }}</a>
                        </li>
                    </ul>
                </div>
            @endcan
            @can('users.index')
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
                        <li>
                            <a href="{{ route('teachers.asigneSubjectToTeacherView') }}">{{ __('Asignacion de Materias') }}</a>
                        </li>
                    </ul>
                </div>
            @endcan
            @can('students.index')
                <!-- hace referencia a Students-->
                <a class="nav-item" data-bs-toggle="collapse" href="#Students" aria-expanded="false" aria-controls="Students">
                    {{ __('Estudiantes') }}
                </a>
                <!-- esta es la referencia de Students-->
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
            @endcan
            @can('student_records.index')
                <!-- inscripciones -->
                <a class="nav-item" href="{{ route('student_records.index') }}">
                    {{ __('Inscritos') }}
                </a>
            @endcan
            @can('users.index')
                <!-- hace referencia a Users-->
                <a class="nav-item" data-bs-toggle="collapse" href="#Users" aria-expanded="false" aria-controls="Users">
                    {{ __('Usuarios') }}
                </a>
                <!-- esta es la referencia de Users-->
                <div class="collapse" id="Users">
                    <ul>
                        <li>
                            <a class="nav-item" href="{{ route('users.index') }}">
                                {{ __('Lista') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-item" href="{{ route('users.create') }}">
                                {{ __('Crear') }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endcan
            {{-- <!-- hace referencia a permissions-->
            <a class="nav-item" data-bs-toggle="collapse" href="#permissions" aria-expanded="false" aria-controls="permissions">
                {{ __('Permisos de Usuarios') }}
            </a>
            <!-- esta es la referencia de permissions-->
            <div class="collapse" id="permissions">
                <ul>
                    <li>
                        <a class="nav-item" href="{{ route('permissions.index') }}">
                            {{ __('Lista') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-item" href="{{ route('permissions.create') }}">
                            {{ __('Crear') }}
                        </a>
                    </li>
                </ul>
            </div>
            <!-- hace referencia a ROLES-->
            <a class="nav-item" data-bs-toggle="collapse" href="#Roles" aria-expanded="false" aria-controls="Roles">
                {{ __('Roles de Usuarios') }}
            </a>
            <!-- esta es la referencia de ROLES-->
            <div class="collapse" id="Roles">
                <ul>
                    <li>
                        <a class="nav-item" href="{{ route('roles.index') }}">
                            {{ __('Lista') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-item" href="{{ route('roles.create') }}">
                            {{ __('Crear') }}
                        </a>
                    </li>
                </ul>
            </div> --}}
        
        </div>
        <!-- barra de navegacion principal -->
        <div class="nav-principal d-flex justify-content-between bg-blue">
            <form action="@yield('search-route')" method="get">
                <div class="d-flex m-3">
                    <input type="text" name="search" class="form-control" placeholder="Filtrar">
                    <button type="submit" class="btn search ml-1">Buscar</button>
                </div>
            </form>
            <div class="accordion-item" style="margin-top: 1rem;">
                
                <a id="navbarDropdown" style="text-decoration: none; color: #ffffff; margin-right: 5rem;" class="nav-item btn" href="#Logout" data-bs-toggle="collapse" aria-controls="Logout" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                
                <div class="collapse dropdown-menu-end" aria-labelledby="navbarDropdown" id="Logout">
                    <a href="{{ route('users.edit', Auth::user()->id) }}" style="text-decoration: none; color: #ffffff;">Editar</a><br>
                    <a class="nav-item text-dark" style="color: #ffffff !important; text-decoration: none;" href="{{ route('logout') }}"
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
    </div>
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
