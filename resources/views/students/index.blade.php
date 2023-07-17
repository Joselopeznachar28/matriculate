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
                      <th>Genero</th>
                      <th>Identificacion</th>
                      <th>Email</th>
                      <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->names }}</td>
                            <td>{{ $student->lastnames }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <a href="{{route('students.show',$student->id)}}" class="btn btn-warning mr-2">Detalles</a>
                                <a href="{{route('students.edit',$student->id)}}" class="btn btn-warning mr-2">Editar</a>
                                <a href="{{route('student_records.create',$student->id)}}" class="btn btn-warning mr-2">Inscribir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection