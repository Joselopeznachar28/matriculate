@extends('layouts.form')

@section('content')
    <div class="card p-4 text-center">
        <div class="row justify-content-between text-uppercase">
            <div class="col-sm-4"><h2>Asignacion de materias</h2></div>
            <div class="col-sm-4"><h2>Año : {{ $section->year_school->name }}</h2></div>
            <div class="col-sm-4"><h2>Seccion : {{ $section->letter }}</h2></div>
        </div><hr>
        <div class="card-body">
            <form action="{{ route('teachers.asigneSubjectToTeacher', $id) }}" method="POST">
                @csrf
                <div class="row justify-content-around">
                    <div class="col-sm-4">
                        <label for="subject_id" class="form-label">{{ __('Materia') }}</label>
                    </div>
                    <div class="col-sm-4">
                        <label for="teacher_id" class="form-label">{{ __('Profesor') }}</label>
                    </div>
                </div>
                @foreach ($section->year_school->subjects as $subject)
                    <div class="row justify-content-around">
                        <!-- Materias -->
                        <div class="col-sm-4">
                            <select name="subject_id[]" id="subject_id" class="form-control" required>
                                <option value={{ $subject->id }}>{{ $subject->name }}</option>
                            </select>
                        </div>
                        <!-- Profesores -->
                        <div class="col-sm-4">
                            <select name="teacher_id[]" id="teacher_id" class="form-control" required>
                                <option value="">Seleccione un profesor...</option>
                                @foreach ($teachers as $teacher)
                                <option 
                                    value={{ $teacher->id }}>
                                    {{ $teacher->name . ' ' . $teacher->lastname . ' - CI: ' . $teacher->identification}} 
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                @endforeach
                <div class="row justify-content-end p-3">
                    <input type="submit" class="btn w-25" value="Guardar">
                </div>
            </form>
        </div>
    </div>
@endsection
