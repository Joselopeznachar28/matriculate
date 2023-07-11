@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>Año Escolar</th>
                      <th>Periodo Academico</th>
                      <th>Materia</th>
                      <th>Codigo de Materia</th>
                      <th>Seccion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($year_schools as $year_school)
                        @foreach ($year_school->subjects as $subject)
                            @foreach ($year_school->academic_periods as $academic_period)
                                @foreach ($academic_period->sections as $section)
                                    <tr>
                                        <td>{{ $section->year_school->name }}</td>
                                        <td>{{ $academic_period->name }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->code }}</td>
                                        <td>{{ $section->letter }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection