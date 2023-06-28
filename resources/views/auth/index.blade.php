@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
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
                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn mr-2">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection