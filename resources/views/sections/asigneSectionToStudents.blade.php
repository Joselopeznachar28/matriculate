@extends('layouts.form')

@section('content')
    <div class="card p-4 text-center">
        <h2 class="text-center text-uppercase">Seleccion de Estudiantes</h2><hr>
        <div class="card-body">
            <form action="{{ route('sections.asignadeSection') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <label for="year_school_id" class="form-label">{{ __('Año escolar') }}</label>
                    </div>
                    <div class="col-sm-3">
                        <label for="section_id" class="form-label">{{ __('Seccion') }}</label>
                    </div>
                    <div class="col-sm-6">
                        <label for="student_record_id" class="form-label">{{ __('Estudiantes') }}</label>
                    </div>
                    <input type="hidden" value="{{ $section->year_school->id }}" name="year_school_id" class="form-control">
                    <input type="hidden" value="{{ $section->id }}" name="section_id" class="form-control">
                </div>
                @foreach ($section->year_school->student_records as $student_record)
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="form-label">{{ $section->year_school->name }}</label>
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label">{{ $section->letter }}</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">{{ $student_record->names . ' ' . $student_record->lastnames }} <span>{{'C.I: ' . $student_record->identification }}</span></label>
                            <input type="checkbox" name="student_record_id[]" id="student_record_id" value="{{ $student_record->id }}">
                        </div>
                    </div>
                @endforeach
                <div class="row justify-content-end p-3">
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                </div>
            </form>
        </div>
    </div>
@endsection
