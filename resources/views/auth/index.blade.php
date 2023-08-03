@extends('home')

@section('content')
    @section('search-route')
        {{route('users.index')}}
    @endsection
    <div class="container">
        <div class="form-students" style="left: 40%;">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn mr-2">Editar</a>
                                <a href="{{ route('users.viewAssignRoleToUser', $user->id) }}" class="btn mr-2">Asignar Rol</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn mr-2" onclick="return confirm('¿Esta seguro de eliminar?')"
                                    value="Borrar">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-between"><b>{{$users->links()}}</b></div>
        </div>
    </div>
@endsection