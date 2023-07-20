@extends('home')

@section('content')
    @section('search-route')
        {{route('teachers.index')}}
    @endsection
    <div class="container">
        <div class="form-students">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Codigo</th>
                      <th>Apellidos</th>
                      <th>Nombres</th>
                      <th>Identificacion</th>
                      <th>Correo</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->code }}</td>
                            <td>{{ $teacher->lastname }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->identification }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td class="d-flex justify-content-center column-gap-2">
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" onclick="return confirm('¿Esta seguro de eliminar?')"
                                    value="Borrar" class="btn btn-danger">
                                </form>
                                <a href="{{route('teachers.edit', $teacher->id)}}" class="btn btn-warning mr-2">Editar</a>
                                <form action="{{ route('teachers.generateUserTeacher', $teacher->id) }}" method="POST">
                                    @csrf
                                    <input type="submit"
                                    value="Generar Usuario" class="btn btn-success">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-between"><b>{{$teachers->links()}}</b></div>
        </div>
    </div>
@endsection