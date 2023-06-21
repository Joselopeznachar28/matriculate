@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Inicio Año Escolar</th>
                      <th>Fin Año Escolar</th>
                      <th>Lapso</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($academic_periods as $academic_period)
                        @foreach ($academic_period->lapsos as $lapso)
                            <tr>
                                <td>{{ $lapso->id }}</td>
                                <td>{{ $academic_period->init }}</td>
                                <td>{{ $academic_period->end }}</td>
                                <td>{{ $lapso->number }}</td>
                                <td>{{ $lapso->init }}</td>
                                <td>{{ $lapso->end }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection