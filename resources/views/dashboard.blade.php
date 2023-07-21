@extends('home')

    @section('content')

    <div class="cards-dashboard" style="margin-top: -30%; margin-left: 35%;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Profesores</h5>
                <h5 class="card-text">Total : {{ $teachers->count() }}</h5>
                {{-- <a href="{{ route('teachers.index') }}" class="btn">Listar</a> --}}
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Usuarios</h5>
                <h5 class="card-text">Total : {{ $users->count() }}</h5>
                {{-- <a href="{{ route('users.index') }}" class="btn">Listar</a> --}}
              </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-uppercase">Lapso Activo</h5>
                <h5 class="card-text">
                    @foreach ($lapso_active as $active)
                        {{ $active ? "Inicio : $active->init" : 'Inicio : N/A'  }}
                    @endforeach
                </h5>
                <h5 class="card-text">
                    @foreach ($lapso_active as $active)
                        {{ $active ? "Final : $active->end" : 'Final : N/A' }}
                    @endforeach
                </h5>
                {{-- <a href="{{ route('users.index') }}" class="btn">Listar</a> --}}
              </div>
        </div>
        @foreach ($year_schools as $year_school)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-uppercase">Año : {{ $year_school->name }}</h5>
                    <h5 class="card-text">Estudiantes : {{ $year_school->student_records->count() }}</h5>
                    <h5 class="card-text">Aprobados : </h5>
                    <h5 class="card-text">Reprobados : </h5>
                    <h5 class="card-text">Secciones : {{ $year_school->sections->count() }}</h5>
                    {{-- <a href="{{ route('student_records.index') }}" class="btn">Listar</a> --}}
                </div>
            </div>
        @endforeach
    </div>

    @endsection