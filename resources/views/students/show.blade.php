@extends('layouts.form')

@section('content')
    <div class="card p-4">
        <h2 class="text-center text-uppercase">detalles de {{ $student->names . ' ' . $student->lastnames }}</h2><hr>
        <!-- nombres, apellidos-->
        <div class="card-body text-center">
            <div class="row">
                <div class="col-sm-6">
                    <label for="lastnames" class="col-form-label">{{ __('Apellidos') }}</label>
                    <input type="text" name="lastnames" id="lastnames" value="{{ $student->lastnames }}" class="form-control" required disable readonly>
                </div>
                <div class="col-sm-6">
                    <label for="names" class="col-form-label">{{ __('Nombres') }}</label>
                    <input type="text" name="names" id="names" value="{{ $student->names }}" class="form-control"  disable readonly>
                </div>
            </div><br>
            <!-- cedula,genero, fecha de nacimiento y lugar de nacimiento -->
            <div class="row">
                <div class="col-sm-3">
                    <label for="identification" class="col-form-label">{{ __('Identificacion') }}</label>
                    <input type="number" name="identification" id="identification" value="{{ $student->identification }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-3">
                    <label for="gender" class="col-form-label">{{ __('Genero') }}</label>
                    <input type="text" name="gender" id="gender" value="{{ $student->gender }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-3">
                    <label for="birthdate" class="col-form-label">{{ __('Fecha de Nacimiento') }}</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ $student->birthdate }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-3">
                    <label for="place_of_birth" class="col-form-label">{{ __('Lugar de Nacimiento') }}</label>
                    <input type="text" name="place_of_birth" id="place_of_birth" value="{{ $student->place_of_birth }}" class="form-control" disable readonly>
                </div>
            </div><br>
            <!-- municipio, estado, lateralidad, peso y estatura -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="municipality" class="col-form-label">{{ __('Municipio Nacimiento') }}</label>
                    <input type="text" name="municipality" id="municipality" value="{{ $student->municipality }}" class="form-control"  disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="state" class="col-form-label">{{ __('Estado Nacimiento') }}</label>
                    <input type="text" name="state" id="state" value="{{ $student->state }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="laterality" class="col-form-label">{{ __('Lateralidad') }}</label>
                    <input type="text" name="laterality" id="laterality" value="{{ $student->laterality }}" class="form-control"  disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="weight" class="col-form-label">{{ __('Peso') }}</label>
                    <input type="number" name="weight" id="weight" value="{{ $student->weight }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="height" class="col-form-label">{{ __('Estatura') }}</label>
                    <input type="number" name="height" id="height" value="{{ $student->height }}" class="form-control"  disable readonly>
                </div>
            </div><br>
            <!-- calzado,pantalon,camisa,orden de nacimiento y medida braquial -->
            <div class="row">
                <div class="col-sm-2">
                    <label for="footwear" class="col-form-label">{{ __('Calzado') }}</label>
                    <input type="number" name="footwear" id="footwear" value="{{ $student->footwear }}" class="form-control"  disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="pants" class="col-form-label">{{ __('Pantalon') }}</label>
                    <input type="number" name="pants" id="pants" value="{{ $student->pants }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="shirt" class="col-form-label">{{ __('Camisa') }}</label>
                    <input type="number" name="shirt" id="shirt" value="{{ $student->shirt }}" class="form-control"  disable readonly>
                </div>
                <div class="col-sm-2">
                    <label for="brachial_measure" class="col-form-label">{{ __('Medida Braquial') }}</label>
                    <input type="number" name="brachial_measure" id="brachial_measure" value="{{ $student->brachial_measure }}" class="form-control" disable readonly>
                </div>
                <div class="col-sm-4">
                    <label for="birth_order" class="col-form-label">{{ __('Orden de Nacimiento') }}</label>
                    <input type="number" name="birth_order" id="birth_order" value="{{ $student->birth_order }}" class="form-control" disable readonly>
                </div>
            </div><br>
            <!-- enfermedad y correo -->
            <div class="row">
                <div class="col-sm-6">
                    <label for="disease" class="col-form-label">{{ __('Padece de alguna enfermedad ?') }}</label>
                    <input type="text" name="disease" id="disease" value="{{ $student->disease }}" class="form-control" disabled readonly>
                </div>
                <div class="col-sm-6">
                    <label for="email" class="col-form-label">{{ __('Correo Electroncio') }}</label>
                    <input type="email" name="email" id="email" value="{{ $student->email }}" class="form-control" placeholder="{{ __('alumno@correo.com') }}" disable readonly>
                </div>
            </div><br>
            <!-- procedencia del plantel educativo -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="school_background" class="col-form-label">{{ __('Procedencia del Plantel Educativo : ') }}</label>
                    <input type="text" name="school_background" id="school_background" value="{{ $student->school_background }}" class="form-control" placeholder="{{ __('Ingrese el nombre del plantel educativo anterior') }}"  disable readonly>
                </div>
            </div>
            <hr><h4 class="text-uppercase">Direccion del estudiante</h4><hr>
            <!-- estado, municipio y parroquia actual -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="state_actual" class="col-form-label">{{ __('Estado') }}</label>
                    <input type="text" name="state_actual" id="state_actual" value="{{ $student->state_actual }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
                <div class="col-sm-4">
                    <label for="municipality_actual" class="col-form-label">{{ __('Municipio') }}</label>
                    <input type="text" name="municipality_actual" id="municipality_actual" value="{{ $student->municipality_actual }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
                <div class="col-sm-4">
                    <label for="parish_actual" class="col-form-label">{{ __('Parroquia') }}</label>
                    <input type="text" name="parish_actual" id="parish_actual" value="{{ $student->parish_actual }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
            </div><br>
            <!-- sector -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="sector" class="col-form-label">{{ __('Sector') }}</label>
                    <input type="text" name="sector" id="sector" value="{{ $student->sector }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
            </div><br>
            <!-- punto de referencia y vive con -->
            <div class="row">
                <div class="col-sm-6">
                    <label for="reference_point" class="col-form-label">{{ __('Punto de Referencia') }}</label>
                    <input type="text" name="reference_point" id="reference_point" value="{{ $student->reference_point }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
                <div class="col-sm-6">
                    <label for="student_live_with" class="col-form-label">{{ __('El estudiante vive con :') }}</label>
                    <input type="text" name="student_live_with" id="student_live_with" value="{{ $student->student_live_with }}" class="form-control" placeholder="{{ __('Actual') }}" disable readonly>
                </div>
            </div>
        </div>
        <div class="row justify-content-end p-3">
            <a href="{{ route('students.index') }}" class="btn btn-primary btn-submit w-25">Regresar</a>
        </div>
    </div>
@endsection