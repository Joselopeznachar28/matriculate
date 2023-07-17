@extends('layouts.form')

@section('content')
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="card p-4 text-center">
            <h2 class="text-center text-uppercase">Crear Profesor</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">{{ __('Nombres') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Ingresar Nombres') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
                        <input type="text" name="lastname" id="lastname" value="{{ old('lastname') }}" class="form-control" placeholder="{{ __('Ingresar Apellidos') }}" required>
    
                        @error('lastname')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="identification" class="form-label">{{ __('Identificacion') }}</label>
                        <input type="number" name="identification" id="identification" value="{{ old('identification') }}" class="form-control" placeholder="{{ __('Ingresar Numero de Identidad') }}" required>
    
                        @error('identification')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="form-label">{{ __('Correo Electronico') }}</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="{{ __('Ingresar Correo Electronico') }}" required>
    
                        @error('email')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection
