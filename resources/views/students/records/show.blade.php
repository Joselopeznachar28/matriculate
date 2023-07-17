@extends('layouts.form')

@section('content')
    <div class="card p-4">
        <h2 class="text-center text-uppercase">Detalles de Ficha de {{ $student_record->names . ' ' . $student_record->lastnames }}</h2><hr>
        <!-- nombres, apellidos y tipo de estudiantes-->
        <div class="card-body text-center">
            <div class="row">
                <div class="col-sm-2">
                    <label for="year_school_id" class="form-label">Año a Cursar</label><br>
                    <input type="text" name="year_school_id" id="year_school_id" value="{{ $student_record->year_school->name }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="section_id" class="form-label">Seccion</label><br>
                    <input type="text" name="section_id" id="section_id" value="{{ $section->letter }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="lastnames" class="col-form-label">{{ __('Apellidos') }}</label>
                    <input type="text" name="lastnames" id="lastnames" value="{{ $student_record->lastnames }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="names" class="col-form-label">{{ __('Nombres') }}</label>
                    <input type="text" name="names" id="names" value="{{ $student_record->names }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="type_student" class="col-form-label">{{ __('Tipo de Estudiante') }}</label>
                    <input type="text" name="type_student" id="type_student" value="{{ $student_record->type_student }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="inscription_number" class="col-form-label">{{ __('Numero de Inscripcion') }}</label>
                    <input type="number" name="inscription_number" id="inscription_number" value="{{ $student_record->inscription_number }}" class="form-control" readonly disabled>
                </div>
            </div><br>
            <!-- cedula,genero, fecha de nacimiento y lugar de nacimiento -->
            <div class="row">
                <div class="col-sm-3">
                    <label for="identification" class="col-form-label">{{ __('Identificacion') }}</label>
                    <input type="number" name="identification" id="identification" value="{{ $student_record->identification }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-3">
                    <label for="gender" class="col-form-label">{{ __('Genero') }}</label>
                    <input type="text" name="gender" id="gender" class="form-control" value="{{ $student_record->gender }}" disabled readonly>
                </div>
                <div class="col-sm-3">
                    <label for="birthdate" class="col-form-label">{{ __('Fecha de Nacimiento') }}</label>
                    <input type="date" name="birthdate" id="birthdate" value="{{ $student_record->birthdate }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-3">
                    <label for="place_of_birth" class="col-form-label">{{ __('Lugar de Nacimiento') }}</label>
                    <input type="text" name="place_of_birth" id="place_of_birth" value="{{ $student_record->place_of_birth }}" class="form-control" readonly disabled>
                </div>
            </div><br>
            <!-- municipio, estado, lateralidad, peso y estatura -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="municipality" class="col-form-label">{{ __('Municipio Nacimiento') }}</label>
                    <input type="text" name="municipality" id="municipality" value="{{ $student_record->municipality }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="state" class="col-form-label">{{ __('Estado Nacimiento') }}</label>
                    <input type="text" name="state" id="state" value="{{ $student_record->state }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="laterality" class="col-form-label">{{ __('Lateralidad') }}</label>
                    <input type="text" name="laterality" id="laterality" value="{{ $student_record->laterality }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="weight" class="col-form-label">{{ __('Peso') }}</label>
                    <input type="number" name="weight" id="weight" value="{{ $student_record->weight }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="height" class="col-form-label">{{ __('Estatura') }}</label>
                    <input type="number" name="height" id="height" value="{{ $student_record->height }}" class="form-control" readonly disabled>
                </div>
            </div><br>
            <!-- calzado,pantalon,camisa,orden de nacimiento y medida braquial -->
            <div class="row">
                <div class="col-sm-2">
                    <label for="footwear" class="col-form-label">{{ __('Calzado') }}</label>
                    <input type="number" name="footwear" id="footwear" value="{{ $student_record->footwear }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="pants" class="col-form-label">{{ __('Pantalon') }}</label>
                    <input type="number" name="pants" id="pants" value="{{ $student_record->pants }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="shirt" class="col-form-label">{{ __('Camisa') }}</label>
                    <input type="number" name="shirt" id="shirt" value="{{ $student_record->shirt }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-2">
                    <label for="brachial_measure" class="col-form-label">{{ __('Medida Braquial') }}</label>
                    <input type="number" name="brachial_measure" id="brachial_measure" value="{{ $student_record->brachial_measure }}" class="form-control" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="birth_order" class="col-form-label">{{ __('Orden de Nacimiento') }}</label>
                    <input type="number" name="birth_order" id="birth_order" value="{{ $student_record->birth_order }}" class="form-control" readonly disabled>
                </div>
            </div><br>
            <!-- enfermedad y correo -->
            <div class="row">
                <div class="col-sm-6">
                    <label for="disease" class="col-form-label">{{ __('Padece de alguna enfermedad ?') }}</label>
                    <input type="text" name="disease" id="disease" value="{{ $student_record->disease }}" class="form-control" readonly disabled placeholder="{{ __('Descripcion') }}">
                </div>
                <div class="col-sm-6">
                    <label for="email" class="col-form-label">{{ __('Correo Electroncio') }}</label>
                    <input type="email" name="email" id="email" value="{{ $student_record->email }}" class="form-control" placeholder="{{ __('alumno@correo.com') }}" readonly disabled>
                </div>
            </div><br>
            <!-- repite con -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="repeat_with" class="col-form-label">{{ __('Repite Con : ') }}</label>
                    <input type="text" name="repeat_with" id="repeat_with" value="{{ $student_record->repeat_with }}" class="form-control" placeholder="{{ __('Repite Con :') }}" disabled>
                </div>
            </div><br>
            <!-- materia pendiente -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="pending_matter" class="col-form-label">{{ __('Materia Pendiente') }}</label>
                    <input type="text" name="pending_matter" id="pending_matter" value="{{ $student_record->pending_matter }}" class="form-control" placeholder="{{ __('Ingrese las materias pendientes') }}" disabled>
                </div>
            </div><br>
            <!-- procedencia del plantel educativo -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="school_background" class="col-form-label">{{ __('Procedencia del Plantel Educativo : ') }}</label>
                    <input type="text" name="school_background" id="school_background" value="{{ $student_record->school_background }}" class="form-control" placeholder="{{ __('Ingrese el nombre del plantel educativo anterior') }}" readonly disabled>
                </div>
            </div>
            <hr><h4 class="text-uppercase">Direccion del estudiante</h4><hr>
            <!-- estado, municipio y parroquia actual -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="state_actual" class="col-form-label">{{ __('Estado') }}</label>
                    <input type="text" name="state_actual" id="state_actual" value="{{ $student_record->state_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="municipality_actual" class="col-form-label">{{ __('Municipio') }}</label>
                    <input type="text" name="municipality_actual" id="municipality_actual" value="{{ $student_record->municipality_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="parish_actual" class="col-form-label">{{ __('Parroquia') }}</label>
                    <input type="text" name="parish_actual" id="parish_actual" value="{{ $student_record->parish_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly disabled>
                </div>
            </div><br>
            <!-- sector -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="sector" class="col-form-label">{{ __('Sector') }}</label>
                    <input type="text" name="sector" id="sector" value="{{ $student_record->sector }}" class="form-control" placeholder="{{ __('Actual') }}" readonly disabled>
                </div>
            </div><br>
            <!-- punto de referencia -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="reference_point" class="col-form-label">{{ __('Punto de Referencia') }}</label>
                    <input type="text" name="reference_point" id="reference_point" value="{{ $student_record->reference_point }}" class="form-control" placeholder="{{ __('Actual') }}" readonly disabled>
                </div>
            </div><br>
            <hr><h4 class="text-uppercase">Registro del Representante Legal</h4><hr>
            <!-- apellidos y nombres del representante -->
            <div class="row">
                <div class="col-sm-6">
                    <label for="pattern_lastnames" class="col-form-label">{{ __('Apellidos') }}</label>
                    <input type="text" name="pattern_lastnames" id="pattern_lastnames" value="{{ $student_record->pattern_lastnames }}" class="form-control" placeholder="{{ __('Apellidos') }}" readonly disabled>
                </div>
                <div class="col-sm-6">
                    <label for="pattern_names" class="col-form-label">{{ __('Nombres') }}</label>
                    <input type="text" name="pattern_names" id="pattern_names" value="{{ $student_record->pattern_names }}" class="form-control" placeholder="{{ __('Nombres') }}" readonly disabled>
                </div>
            </div><br>
            <!-- cedula, lugar, estado y fecha de nacimiento -->
            <div class="row">
                <div class="col-sm-3">
                    <label for="pattern_identification" class="col-form-label">{{ __('Identificacion') }}</label>
                    <input type="number" name="pattern_identification" id="pattern_identification" value="{{ $student_record->pattern_identification }}" class="form-control" placeholder="{{ __('Identificacion') }}" readonly disabled>
                </div>
                <div class="col-sm-3">
                    <label for="pattern_state_of_birth" class="col-form-label">{{ __('Estado de Nacimiento') }}</label>
                    <input type="text" name="pattern_state_of_birth" id="pattern_state_of_birth" value="{{ $student_record->pattern_state_of_birth }}" class="form-control" placeholder="{{ __('Estado de Nacimiento') }}" readonly disabled>
                </div>
                <div class="col-sm-3">
                    <label for="pattern_birthdate" class="col-form-label">{{ __('Fecha de Nacimiento') }}</label>
                    <input type="date" name="pattern_birthdate" id="pattern_birthdate" value="{{ $student_record->pattern_birthdate }}" class="form-control" placeholder="{{ __('Fecha') }}" readonly disabled>
                </div>
                <div class="col-sm-3">
                    <label for="pattern_place_of_birth" class="col-form-label">{{ __('Lugar de Nacimiento') }}</label>
                    <input type="text" name="pattern_place_of_birth" id="pattern_place_of_birth" value="{{ $student_record->pattern_place_of_birth }}" class="form-control" placeholder="{{ __('Lugar de Nacimiento') }}" readonly disabled>
                </div>
            </div><br>
            <!-- sexo, estado civil y afinidad -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="pattern_gender" class="col-form-label">{{ __('Genero') }}</label>
                    <input type="text" name="pattern_gender" id="pattern_gender" value="{{ $student_record->pattern_gender }}" class="form-control" placeholder="{{ __('Lugar de Nacimiento') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="pattern_civil_status" class="col-form-label">{{ __('Estado Civil') }}</label>
                    <input type="text" name="pattern_civil_status" id="pattern_civil_status" value="{{ $student_record->pattern_civil_status }}" class="form-control" placeholder="{{ __('Lugar de Nacimiento') }}" readonly disabled>
                </div> 
                <div class="col-sm-4">
                    <label for="pattern_affinity" class="col-form-label">{{ __('Afinidad') }}</label>
                    <input type="text" name="pattern_affinity" id="pattern_affinity" value="{{ $student_record->pattern_affinity }}" class="form-control" placeholder="{{ __('Afinidad') }}" readonly disabled>
                </div>
            </div><br>
            <!-- Profesion y telefono -->
            <div class="row">
                <div class="col-sm-8">
                    <label for="pattern_profession" class="col-form-label">{{ __('Profesion u Oficio') }}</label>
                    <input type="text" name="pattern_profession" id="pattern_profession" value="{{ $student_record->pattern_profession }}" class="form-control" placeholder="{{ __('Descripcion') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="pattern_phone" class="col-form-label">{{ __('Telefono de Contacto') }}</label>
                    <input type="tel" name="pattern_phone" id="pattern_phone" value="{{ $student_record->pattern_phone }}" class="form-control" placeholder="{{ __('Activo') }}" readonly disabled>
                </div>
            </div><br>
            <!-- Vive con, fecha de inscripcion y registrado por -->
            <div class="row">
                <div class="col-sm-4">
                    <label for="student_live_with" class="col-form-label">{{ __('El estudiante vive con :') }}</label>
                    <input type="text" name="student_live_with" id="student_live_with" value="{{ $student_record->student_live_with }}" class="form-control" placeholder="{{ __('Descripcion') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="registration_made_by" class="col-form-label">{{ __('Inscripcion realizada por :') }}</label>
                    <input type="text" name="registration_made_by" id="registration_made_by" value="{{ $student_record->registration_made_by }}" class="form-control" placeholder="{{ __('Nombre y Apellido') }}" readonly disabled>
                </div>
                <div class="col-sm-4">
                    <label for="inscription_date" class="col-form-label">{{ __('Fecha de Inscripcion') }}</label>
                    <input type="date" name="inscription_date" id="inscription_date" value="{{ $student_record->inscription_date }}" class="form-control"readonly disabled>
                </div>
            </div><br>
            <!-- observacion -->
            <div class="row">
                <div class="col-sm-12">
                    <label for="observation" class="col-form-label">{{ __('Observaciones') }}</label>
                    <textarea name="observation" id="observation" cols="30"  class="form-control" readonly disabled>{{ $student_record->observation }}</textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-end p-3">
            <a href="{{ route('student_records.index') }}" class="btn btn-primary btn-submit w-25">Regresar</a>
        </div>
    </div>
@endsection