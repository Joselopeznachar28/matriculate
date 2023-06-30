@extends('layouts.form')

@section('content')
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Crear Nuevo Permiso</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">{{ __('Nombre del Permiso') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Ingresar el nombre del nuevo permiso') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="description" class="form-label">{{ __('Descripcion del Permiso') }}</label>
                        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control" placeholder="{{ __('Ingresar descripcion breve del permiso') }}" required>
    
                        @error('description')
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
