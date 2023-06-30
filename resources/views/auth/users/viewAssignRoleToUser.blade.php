@extends('layouts.form')

@section('content')
    <form action="{{ route('users.assignRoleToUser', $user->id) }}" method="POST">
        @csrf
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Añadir Roles a Usuarios</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">{{ __('Usuario') }}</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="{{ __('Ingresar el nombre del nuevo permiso') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="form-label">{{ __('Correo') }}</label>
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="{{ __('Ingresar descripcion breve del permiso') }}" required>
    
                        @error('email')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div><br>
            <h2 class="text-center text-uppercase">Roles</h2><hr>
            @foreach ($roles as $role)
                    <div class="form-check">
                        <label for="role_id[]">{{ $role->name }}</label>
                        <input type="checkbox" name="role_id[]" id="role_id[]" class="form-check-input" value="{{ $role->id }}" required>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection
