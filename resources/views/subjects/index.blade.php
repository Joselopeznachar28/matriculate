@extends('home')

@section('content')
    @section('search-route')
        {{route('subjets.index')}}
    @endsection
    <div class="container">
        <div class="form-students" style="left: 50%; ">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Codigo</th>
                      <th>Año</th>
                      <th>Materia</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->code }}</td>
                            <td>{{ $subject->year_school->name }}</td>
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
            <div class="d-flex justify-content-between"><b>{{$subjects->links()}}</b></div>
        </div>
    </div>
@endsection