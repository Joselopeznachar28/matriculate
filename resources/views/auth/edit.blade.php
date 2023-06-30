@extends('layouts.form')

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card p-4">
            <hr><h2 class="text-center text-uppercase">Editar Usuario</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Nombre') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus placeholder="Ingrese Nombre y Apellido">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Correo Electronico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email" placeholder="Ingrese el correo electronico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Ingrese una contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita la contraseña">
                    </div>
                </div><br><hr>
                <h2 class="text-center text-uppercase">Editar Roles de {{ $user->name }}</h2><hr>
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

