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
            @foreach ($year_schools as $year_school)
                @foreach ($year_school->sections as $section)
                    <div class="row">
                        <!-- año escolar -->
                        <div class="col-sm-3">
                            <li style="list-style: none;">{{ $year_school->name }}</li>
                        </div>
                        <!-- Codigo de Materia -->
                        <div class="col-sm-3">
                            <li style="list-style: none;">{{ $section->subject->code }}</li>
                        </div>
                        <!-- Materia -->
                        <div class="col-sm-3">
                            <li style="list-style: none;">{{ $section->subject->name }}</li>
                        </div>
                        <!-- SECCION -->
                        <div class="col-sm-3">
                            <a href="{{ route('sections.asigneSectionToStudents',$section->id) }}" class="text-black">{{ $section->letter}}</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
