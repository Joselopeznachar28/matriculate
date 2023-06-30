@extends('layouts.form')

@section('content')
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Detalles del Permiso</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">{{ __('Nombre del Permiso') }}</label>
                        <input type="text" value="{{ $permission->name }}" class="form-control" disabled readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="description" class="form-label">{{ __('Descripcion del Permiso') }}</label>
                        <input type="text" value="{{ $permission->description }}" class="form-control" disabled readonly>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end p-3">
                <a href="{{ route('permissions.index') }}" class="btn w-25">Regresar</a>
            </div>
        </div>
@endsection
