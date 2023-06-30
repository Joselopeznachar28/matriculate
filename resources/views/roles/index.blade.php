@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Role</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn">Editar</a>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn">Detalles</a>
                                <form action="{{ route('roles.destroy',$role->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection