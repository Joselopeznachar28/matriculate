@extends('home')

    @section('content')
        <a href="{{ route('report') }}" class="btn positionBtnGenerate">Generar Reporte</a>

        <div class="positionGraphic">
            <div style="height: 400px !important; margin-left: 30%;">
                <canvas id="myChart"></canvas>
            </div><br>
            <div class="cards-dashboard">
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
                            {{-- <h5 class="card-text">Aprobados : </h5>
                            <h5 class="card-text">Reprobados : </h5> --}}
                            <h5 class="card-text">Secciones : {{ $year_school->sections->count() }}</h5>
                            {{-- <a href="{{ route('student_records.index') }}" class="btn">Listar</a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>

            const aproved = @json($aproved);
            const reproved = @json($reproved);
            const ctx = document.getElementById('myChart');
        
            new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Reprobados','Aprobados'],
                datasets: [{
                data: [reproved,aproved],
                backgroundColor: [
                    'rgb(255, 174, 154)',
                    'rgb(141, 175, 253)',
                    ],
                }]
            },
            });
        </script>

    @endsection