@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Materia</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->name }}</td>
                            <td class="d-flex justify-content-center column-gap-2">
                                <div>
                                    <form action="{{ route('subjets.destroy', $subject->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" onclick="return confirm('¿Esta seguro de eliminar?')"
                                        value="Borrar" class="btn btn-danger">
                                    </form>
                                </div>
                                <div>
                                    <a href="{{route('subjets.edit',$subject->id)}}" class="btn btn-warning mr-2">Editar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection