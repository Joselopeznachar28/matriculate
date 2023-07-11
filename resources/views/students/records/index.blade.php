@extends('home')

@section('content')
    <div class="container">
        <div class="form-students">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Año a Cursar</th>
                      <th>N° Inscripcion</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Identificacion</th>
                      <th>Genero</th>
                      <th>Representante</th>
                      <th>Opciones/Constancia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student_records as $student_record)
                        <tr>
                            <td>{{ $student_record->id }}</td>
                            <td>{{ $student_record->year_school->name }}</td>
                            <td>{{ $student_record->inscription_number }}</td>
                            <td>{{ $student_record->names }}</td>
                            <td>{{ $student_record->lastnames }}</td>
                            <td>{{ $student_record->identification }}</td>
                            <td>{{ $student_record->gender }}</td>
                            <td>{{ $student_record->pattern_lastnames . ' ' . $student_record->pattern_names }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <a href="{{route('student_records.edit',$student_record->id)}}" class="btn btn-warning mr-2">Editar</a>
                                <a href="{{route('student_records.proof_of_registration', $student_record->id)}}" class="btn btn-info mr-2">Inscripcion</a>
                                <a href="{{route('student_records.proof_of_study',$student_record->student->id)}}" class="btn btn-info mr-2">Estudio</a>
                                <a href="{{route('student_records.bulletin',$student_record)}}" class="btn btn-info mr-2">Boletin</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection