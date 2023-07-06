@extends('layouts.form')

@section('content')
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="card p-4 text-center">
            <h2 class="text-center text-uppercase">Crear Profesor</h2><hr>
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>Nro°</th>
                      <th>Identificacion</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Nota</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($record_students as $record_student)
                        <tr>
                            <input type="hidden" name="student_record_id" value="{{ $record_student->id }}">
                            <td>{{ $count }}</td>
                            <td>{{ $record_student->identification }}</td>
                            <td>{{ $record_student->lastnames }}</td>
                            <td>{{ $record_student->names }}</td>
                            {{-- <td>
                                <input type="number" name="" id="">
                            </td> --}}
                        </tr>
                        @php
                            $count++;
                        @endphp
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection
