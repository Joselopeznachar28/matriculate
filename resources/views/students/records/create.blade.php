@extends('layouts.form')

@section('content')
        <form action="{{ route('student_records.store') }}" method="POST">
            @csrf
            <div class="card p-4">
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <h2 class="text-center text-uppercase">Ficha de inscripcion del estudiante</h2><hr>
                <div class="card-body text-center">
                    <!-- nombres, apellidos y tipo de estudiantes, año, numero de inscripcion-->
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="year_school_id" class="form-label">Año a Cursar</label><br>
                            <select name="year_school_id" id="year_school_id" class="form-control" required>
                                <option value="">{{ __('Seleccione una opcion...') }}</option>
                                @foreach ($year_schools as $year_school)
                                    <option value={{ $year_school->id }}>{{ $year_school->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="lastnames" class="col-form-label">{{ __('Apellidos') }}</label>
                            <input type="text" name="lastnames" id="lastnames" value="{{ $student->lastnames }}" class="form-control" placeholder="{{ __('Apellidos') }}" readonly>
        
                            @error('lastnames')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="names" class="col-form-label">{{ __('Nombres') }}</label>
                            <input type="text" name="names" id="names" value="{{ $student->names }}" class="form-control" placeholder="{{ __('Nombres') }}" readonly>
        
                            @error('names')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="type_student" class="col-form-label">{{ __('Tipo de Estudiante') }}</label>
                            <select name="type_student" id="type_student" class="form-control" required>
                                <option value="">{{ __('Seleccione una opcion...') }}</option>
                                <option value="Regular">{{ __('Regular') }}</option>
                                <option value="Repitiente">{{ __('Repitiente') }}</option>
                            </select>
        
                            @error('type_student')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="inscription_number" class="col-form-label">{{ __('Numero de Inscripcion') }}</label>
                            <input type="number" name="inscription_number" id="inscription_number" value="{{ old('inscription_number') }}" class="form-control" placeholder="{{ __('Numero de Inscripcion') }}" required autofocus>
        
                            @error('inscription_number')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- cedula,genero, fecha de nacimiento y lugar de nacimiento -->
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="identification" class="col-form-label">{{ __('Identificacion') }}</label>
                            <input type="number" name="identification" id="identification" value="{{ $student->identification }}" class="form-control" placeholder="{{ __('Identificacion') }}" readonly>
        
                            @error('identification')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="gender" class="col-form-label">{{ __('Genero') }}</label>
                            <input type="text" value="{{ $student->gender }}" class="form-control" readonly name="gender">
        
                            @error('gender')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="birthdate" class="col-form-label">{{ __('Fecha de Nacimiento') }}</label>
                            <input type="date" name="birthdate" id="birthdate" value="{{ $student->birthdate }}" class="form-control" placeholder="{{ __('Fecha') }}" readonly>
        
                            @error('birthdate')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="place_of_birth" class="col-form-label">{{ __('Lugar de Nacimiento') }}</label>
                            <input type="text" name="place_of_birth" id="place_of_birth" value="{{ $student->place_of_birth }}" class="form-control" placeholder="{{ __('Lugar de Nacimiento') }}" readonly>
        
                            @error('place_of_birth')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- municipio, estado, lateralidad, peso y estatura -->
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="municipality" class="col-form-label">{{ __('Municipio') }}</label>
                            <input type="text" name="municipality" id="municipality" value="{{ $student->municipality }}" class="form-control" placeholder="{{ __('Nacimiento') }}" readonly>
        
                            @error('municipality')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="state" class="col-form-label">{{ __('Estado') }}</label>
                            <input type="text" name="state" id="state" value="{{ $student->state }}" class="form-control" placeholder="{{ __('Nacimiento') }}" readonly>
        
                            @error('state')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="laterality" class="col-form-label">{{ __('Lateralidad') }}</label>
                            <input type="text" name="laterality" id="laterality" value="{{ $student->laterality }}" class="form-control" placeholder="{{ __('Lateralidad') }}" readonly>
        
                            @error('laterality')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="weight" class="col-form-label">{{ __('Peso') }}</label>
                            <input type="number" name="weight" id="weight" value="{{ $student->weight }}" class="form-control" placeholder="{{ __('KG') }}" readonly>
        
                            @error('weight')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="height" class="col-form-label">{{ __('Estatura') }}</label>
                            <input type="number" name="height" id="height" value="{{ $student->height }}" class="form-control" placeholder="{{ __('CM') }}" readonly>
        
                            @error('height')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- calzado,pantalon,camisa,orden de nacimiento y medida braquial -->
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="footwear" class="col-form-label">{{ __('Calzado') }}</label>
                            <input type="number" name="footwear" id="footwear" value="{{ $student->footwear }}" class="form-control" placeholder="{{ __('Medida') }}" readonly>
        
                            @error('footwear')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="pants" class="col-form-label">{{ __('Pantalon') }}</label>
                            <input type="number" name="pants" id="pants" value="{{ $student->pants }}" class="form-control" placeholder="{{ __('Medida') }}" readonly>
        
                            @error('pants')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="shirt" class="col-form-label">{{ __('Camisa') }}</label>
                            <input type="number" name="shirt" id="shirt" value="{{ $student->shirt }}" class="form-control" placeholder="{{ __('Medida') }}" readonly>
        
                            @error('shirt')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-2">
                            <label for="brachial_measure" class="col-form-label">{{ __('Medida Braquial') }}</label>
                            <input type="number" name="brachial_measure" id="brachial_measure" value="{{ $student->brachial_measure }}" class="form-control" placeholder="{{ __('Medida') }}" readonly>
        
                            @error('brachial_measure')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="birth_order" class="col-form-label">{{ __('Orden de Nacimiento') }}</label>
                            <input type="number" name="birth_order" id="birth_order" value="{{ $student->birth_order }}" class="form-control" placeholder="{{ __('Nacimiento') }}" readonly>
        
                            @error('birth_order')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- enfermedad y correo -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="disease" class="col-form-label">{{ __('Padece de alguna enfermedad ?') }}</label>
                            <input type="text" name="disease" id="disease" value="{{ $student->disease }}" class="form-control" placeholder="{{ __('No presenta enfermedad') }}" readonly>
        
                            @error('disease')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="col-form-label">{{ __('Correo Electroncio') }}</label>
                            <input type="email" name="email" id="email" value="{{ $student->email }}" class="form-control" placeholder="{{ __('No posee corre electronico') }}" readonly>
        
                            @error('email')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- repite con -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="repeat_with" class="col-form-label">{{ __('Repite Con : ') }}</label>
                            <input type="text" name="repeat_with" id="repeat_with" value="{{ old('repeat_with') }}" class="form-control" placeholder="{{ __('Repite Con :') }}" required autofocus>
        
                            @error('repeat_with')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- materia pendiente -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="pending_matter" class="col-form-label">{{ __('Materia Pendiente') }}</label>
                            <input type="text" name="pending_matter" id="pending_matter" value="{{ old('pending_matter') }}" class="form-control" placeholder="{{ __('Ingrese las materias pendientes') }}" required autofocus>
        
                            @error('pending_matter')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- procedencia del plantel educativo -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="school_background" class="col-form-label">{{ __('Procedencia del Plantel Educativo : ') }}</label>
                            <input type="text" name="school_background" id="school_background" value="{{ $student->school_background }}" class="form-control" placeholder="{{ __('Ingrese el nombre del plantel educativo anterior') }}" readonly>
        
                            @error('school_background')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div>
                    <hr><h4 class="text-uppercase">Direccion del estudiante</h4><hr>
                    <!-- estado, municipio y parroquia actual -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="state_actual" class="col-form-label">{{ __('Estado') }}</label>
                            <input type="text" name="state_actual" id="state_actual" value="{{ $student->state_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly>
        
                            @error('state_actual')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="municipality_actual" class="col-form-label">{{ __('Municipio') }}</label>
                            <input type="text" name="municipality_actual" id="municipality_actual" value="{{ $student->municipality_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly>
        
                            @error('municipality_actual')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="parish_actual" class="col-form-label">{{ __('Parroquia') }}</label>
                            <input type="text" name="parish_actual" id="parish_actual" value="{{ $student->parish_actual }}" class="form-control" placeholder="{{ __('Actual') }}" readonly>
        
                            @error('parish_actual')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- sector -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="sector" class="col-form-label">{{ __('Sector') }}</label>
                            <input type="text" name="sector" id="sector" value="{{ $student->sector }}" class="form-control" placeholder="{{ __('Actual') }}" readonly>
        
                            @error('sector')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- punto de referencia -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="reference_point" class="col-form-label">{{ __('Punto de Referencia') }}</label>
                            <input type="text" name="reference_point" id="reference_point" value="{{ $student->reference_point }}" class="form-control" placeholder="{{ __('Actual') }}" readonly>
        
                            @error('reference_point')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <hr><h4 class="text-uppercase">Registro del Representante Legal</h4><hr>
                    <!-- apellidos y nombres del representante -->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="pattern_lastnames" class="col-form-label">{{ __('Apellidos') }}</label>
                            <input type="text" name="pattern_lastnames" id="pattern_lastnames" value="{{ old('pattern_lastnames') }}" class="form-control" placeholder="{{ __('Apellidos') }}" required autofocus>
        
                            @error('pattern_lastnames')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-6">
                            <label for="pattern_names" class="col-form-label">{{ __('Nombres') }}</label>
                            <input type="text" name="pattern_names" id="pattern_names" value="{{ old('pattern_names') }}" class="form-control" placeholder="{{ __('Nombres') }}" required autofocus>
        
                            @error('pattern_names')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- cedula, lugar, estado y fecha de nacimiento -->
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="pattern_identification" class="col-form-label">{{ __('Identificacion') }}</label>
                            <input type="number" name="pattern_identification" id="pattern_identification" value="{{ old('pattern_identification') }}" class="form-control" placeholder="{{ __('Identificacion') }}" required autofocus>
        
                            @error('pattern_identification')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="pattern_state_of_birth" class="col-form-label">{{ __('Estado de Nacimiento') }}</label>
                            <input type="text" name="pattern_state_of_birth" id="pattern_state_of_birth" value="{{ old('pattern_state_of_birth') }}" class="form-control" placeholder="{{ __('Estado de Nacimiento') }}" required autofocus>
        
                            @error('pattern_state_of_birth')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="pattern_birthdate" class="col-form-label">{{ __('Fecha de Nacimiento') }}</label>
                            <input type="date" name="pattern_birthdate" id="pattern_birthdate" value="{{ old('pattern_birthdate') }}" class="form-control" placeholder="{{ __('Fecha') }}" required autofocus>
        
                            @error('pattern_birthdate')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-3">
                            <label for="pattern_place_of_birth" class="col-form-label">{{ __('Lugar de Nacimiento') }}</label>
                            <input type="text" name="pattern_place_of_birth" id="pattern_place_of_birth" value="{{ old('pattern_place_of_birth') }}" class="form-control" placeholder="{{ __('Lugar de Nacimiento') }}" required autofocus>
        
                            @error('pattern_place_of_birth')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- sexo, estado civil y afinidad -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="pattern_gender" class="col-form-label">{{ __('Genero') }}</label>
                            <select name="pattern_gender" id="pattern_gender" class="form-control" required>
                                <option value="">{{ __('Seleccione una opcion...') }}</option>
                                <option value="Femenino">{{ __('Femenino') }}</option>
                                <option value="Masculino">{{ __('Masculino') }}</option>
                            </select>
        
                            @error('pattern_gender')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="pattern_civil_status" class="col-form-label">{{ __('Estado Civil') }}</label>
                            <select name="pattern_civil_status" id="pattern_civil_status" class="form-control" required>
                                <option value="">{{ __('Seleccione una opcion...') }}</option>
                                <option value="Solter@">{{ __('Solter@') }}</option>
                                <option value="Casad@">{{ __('Casa@') }}</option>
                                <option value="Divorciad@">{{ __('Divorciad@') }}</option>
                            </select>
        
                            @error('pattern_civil_status')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div> 
                        <div class="col-sm-4">
                            <label for="pattern_affinity" class="col-form-label">{{ __('Afinidad') }}</label>
                            <input type="text" name="pattern_affinity" id="pattern_affinity" value="{{ old('pattern_affinity') }}" class="form-control" placeholder="{{ __('Afinidad') }}" required autofocus>
        
                            @error('pattern_affinity')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- Profesion y telefono -->
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="pattern_profession" class="col-form-label">{{ __('Profesion u Oficio') }}</label>
                            <input type="text" name="pattern_profession" id="pattern_profession" value="{{ old('pattern_profession') }}" class="form-control" placeholder="{{ __('Descripcion') }}" required autofocus>
        
                            @error('pattern_profession')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="pattern_phone" class="col-form-label">{{ __('Telefono de Contacto') }}</label>
                            <input type="tel" name="pattern_phone" id="pattern_phone" value="{{ old('pattern_phone') }}" class="form-control" placeholder="{{ __('Activo') }}" required autofocus>
        
                            @error('pattern_phone')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- Vive con, fecha de inscripcion y registrado por -->
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="student_live_with" class="col-form-label">{{ __('El estudiante vive con :') }}</label>
                            <select name="student_live_with" id="student_live_with" class="form-control" required>
                                <option value="">{{ __('Seleccione una opcion...') }}</option>
                                <option value="Madre">{{ __('Madre') }}</option>
                                <option value="Padre">{{ __('Padre') }}</option>
                                <option value="Ambos">{{ __('Ambos') }}</option>
                                <option value="Abuelos">{{ __('Abuelos') }}</option>
                                <option value="Otros">{{ __('Otros') }}</option>
                            </select>
        
                            @error('student_live_with')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="registration_made_by" class="col-form-label">{{ __('Inscripcion realizada por :') }}</label>
                            <input type="text" name="registration_made_by" id="registration_made_by" value="{{ old('registration_made_by') }}" class="form-control" placeholder="{{ __('Nombre y Apellido') }}" required autofocus>
        
                            @error('registration_made_by')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-4">
                            <label for="inscription_date" class="col-form-label">{{ __('Fecha de Inscripcion') }}</label>
                            <input type="date" name="inscription_date" id="inscription_date" value="{{ old('inscription_date') }}" class="form-control"required autofocus>
        
                            @error('inscription_date')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                    </div><br>
                    <!-- observacion -->
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="observation" class="col-form-label">{{ __('Observaciones') }}</label>
                            <textarea name="observation" id="observation" cols="30"  class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end p-3">
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                </div>
            </div>
        </form>
    </div>
@endsection