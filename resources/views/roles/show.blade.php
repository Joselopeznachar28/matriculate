@extends('layouts.form')

@section('content')
    <div class="card p-4">
        <h2 class="text-center text-uppercase">Detalles del Rol</h2><hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <label for="name" class="form-label">{{ __('Nombre del rol') }}</label>
                    <input type="text"  value="{{ $role->name }}" class="form-control" disabled readonly>
                </div>
            </div><br>
            <h3 class="text-center text-uppercase">Lista de Permisos</h3><hr>
            @foreach ($role->permissions as $permission)
                <div class="form-check">
                    <label for="permissions[]">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>
    </div>
@endsection
