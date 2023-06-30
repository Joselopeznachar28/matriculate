@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Permiso</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->description }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn">Editar</a>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn">Detalles</a>
                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="post">
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