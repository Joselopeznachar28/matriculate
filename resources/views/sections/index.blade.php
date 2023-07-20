@extends('home')

@section('content')
    @section('search-route')
        {{route('sections.index')}}
    @endsection
    <div class="container">
        <div class="form-students" style="left: 40%;">
            <table class="table table-hover text-center">
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
                    @foreach ($sections as $section)
                        @foreach ($section->year_school->subjects as $subject)
                            @foreach ($section->year_school->academic_periods as $academic_period)
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
            <div class="d-flex justify-content-between"><b>{{$sections->links()}}</b></div>
        </div>
    </div>
@endsection