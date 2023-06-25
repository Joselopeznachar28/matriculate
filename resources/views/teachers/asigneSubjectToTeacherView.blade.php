@extends('layouts.form')

@section('content')
    <div class="card p-4 text-center">
        <h2 class="text-center text-uppercase">Asignar materias</h2><hr>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <label for="year_school_id" class="form-label">{{ __('Año escolar') }}</label>
                </div>
                <div class="col-sm-3">
                    <label for="section_id" class="form-label">{{ __('Secciones') }}</label>
                </div>
            </div>
            @foreach ($sections as $section)
                <div class="row">
                    <!-- año escolar -->
                    <div class="col-sm-3">
                        <li style="list-style: none;">{{ $section->year_school->name }}</li>
                    </div>
                    <!-- SECCION -->
                    <div class="col-sm-3">
                        <a href="{{ route('teachers.subjectYear', $section->id) }}" class="text-black">{{ $section->letter}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
