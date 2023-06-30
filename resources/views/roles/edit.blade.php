@extends('layouts.form')

@section('content')
    <form action="{{ route('roles.update',$role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Editar Rol</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="name" class="form-label">{{ __('Nombre del rol') }}</label>
                        <input type="text" name="name" id="name" value="{{ $role->name }}" class="form-control" placeholder="{{ __('Ingresar el nombre del nuevo rol') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }}</span><br/>
                        @enderror
    
                    </div>
                </div>
                <h3 class="text-center text-uppercase">Lista de Permisos</h3><hr>
                @foreach ($permissions as $permission)
                    <div class="form-check">
                        <label for="permission_id[]">{{ $permission->name }}</label>
                        <input type="checkbox" name="permission_id[]" id="permission_id[]" class="form-check-input" required value="{{ $permission->id }}">
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection
