@extends('layouts.form')

@section('content')
    <div class="card p-4 text-center">
        <h2 class="text-uppercase">Seleccion de Estudiantes - Materia : {{ $section->subject->name }} - Seccion : {{ $section->letter }} </h2>
        <h2 class="text-uppercase">Año escolar: {{ $section->year_school->name }}</h2><hr>
        <div class="card-body">
            <form action="{{ route('sections.asignadeSection') }}" method="post">
                @csrf
                    <input type="hidden" value="{{ $section->year_school->id }}" name="year_school_id" class="form-control">
                    <input type="hidden" value="{{ $section->id }}" name="section_id" class="form-control">
                @foreach ($section->year_school->student_records as $student_record)
                    <div class="col-sm-12">
                        <label class="form-label">{{ $student_record->names }} <span>{{'C.I: ' . $student_record->identification }}</span></label>
                        <input type="checkbox" name="student_record_id[]" id="student_record_id" value="{{ $student_record->id }}">
                    </div>
                @endforeach
                <div class="row justify-content-end p-3">
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                </div>
            </form>
        </div>
    </div>
@endsection
