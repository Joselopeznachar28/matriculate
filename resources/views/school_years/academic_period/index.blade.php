@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Añadir Corte</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($academic_periods as $period)
                        <tr>
                            <td>{{ $period->id }}</td>
                            <td>{{ $period->init }}</td>
                            <td>{{ $period->end }}</td>
                            <td>
                                <a href="{{ route('lapso_schools.create', $period->id) }}" class="btn btn-success">Añadir</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection