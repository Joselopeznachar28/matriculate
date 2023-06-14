@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Profesor</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher->id }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td class="d-flex justify-content-center column-gap-2">
                                <div>
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('¿Esta seguro de eliminar?')"
                                        value="Borrar" class="btn btn-danger">
                                    </form>
                                </div>
                                <div>
                                    <a href="{{route('teachers.edit', $teacher->id)}}" class="btn btn-warning mr-2">Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection