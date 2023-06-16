@extends('home')

@section('content')
    <div class="container">
        <div class="form-students">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Estudiante</th>
                      <th>Genero</th>
                      <th>Identificacion</th>
                      <th>Email</th>
                      <th>Representante</th>
                      <th>Opciones / Constancias</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->inscription_number }}</td>
                            <td>{{ $student->names }}</td>
                            <td>{{ $student->lastnames }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->type_student }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->pattern_names . ' ' . $student->pattern_lastnames}}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <div>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('¿Esta seguro de eliminar?')"
                                        value="Borrar" class="btn btn-danger">
                                    </form>
                                </div>
                                <div>
                                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-warning mr-2">Editar</a>
                                </div>
                                <div>
                                    <a href="{{ route('students.proof_of_registration', $student->id) }}" class="btn btn-info mr-2">Inscripcion</a>
                                </div>
                                <div>
                                    <a href="{{ route('students.proof_of_study', $student->id) }}" class="btn btn-info mr-2">Estudios</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection