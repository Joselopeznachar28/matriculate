@extends('layouts.form')

@section('content')
    <div class="card p-4 text-center">
        <h2 class="text-center text-uppercase">Asignar Estudiantes</h2><hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label for="year_school_id" class="form-label">{{ __('Año escolar') }}</label>
                </div>
                <div class="col-sm-3">
                    <label for="section_id" class="form-label">{{ __('Codigo de Materias') }}</label>
                </div>
                <div class="col-sm-3">
                    <label for="section_id" class="form-label">{{ __('Materias') }}</label>
                </div>
                <div class="col-sm-3">
                    <label for="section_id" class="form-label">{{ __('Secciones') }}</label>
                </div>
            </div>
        </div>
    </div>
@endsection
