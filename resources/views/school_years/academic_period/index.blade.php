@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($academic_periods as $period)
                        <tr>
                            <td>{{ $period->id }}</td>
                            <td>{{ $period->init }}</td>
                            <td>{{ $period->end }}</td>
                            <td class="d-flex justify-content-center column-gap-2">
                                <a href="{{ route('academic_period.edit', $period->id) }}" class="btn btn-success">Editar</a>
                                <a href="{{ route('lapso_schools.create', $period->id) }}" class="btn btn-success">Añadir Lapso</a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection