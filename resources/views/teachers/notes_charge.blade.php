@extends('layouts.form')

@section('content')
    <form action="{{ route('notes_charge.store') }}" method="POST">
        @csrf
        <input type="hidden" name="year_school_id" value="{{ $year_school->id }}">
        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
        <input type="hidden" name="section_id" value="{{ $section->id }}">
        <input type="hidden" name="lapso_id" value="{{ $lapso->id }}">
        <div class="card p-4 text-center">
            <div class="row justify-content-around text-uppercase">
                <div class="col-sm-4">
                    <h3>Año escolar : {{ $year_school->name }}</h3>
                </div>
                <div class="col-sm-4">
                    <h3>materia : {{ $subject->name }}</h3>
                </div>
                <div class="col-sm-4">
                <h3>seccion : {{ $section->letter }}</h3>
                </div>
            </div><hr>
            @php
                $count = 1;
            @endphp
            <div class="row">
                <div class="col-sm-1">
                    <label for="numero" class="form-label">Nro°</label>
                </div>
                <div class="col-sm-3">
                    <label for="identification" class="form-label">Identificacion</label>
                </div>
                <div class="col-sm-3">
                    <label for="lastnames" class="form-label">Apellidos</label>
                </div>
                <div class="col-sm-3">
                    <label for="names" class="form-label">Nombres</label>
                </div>
                <div class="col-sm-2">
                    <label for="note[{{ $count }}]" class="form-label">Nota</label>
                </div>
            </div>
            @foreach ($record_students as $record_student)
                <input type="hidden" name="student_record_id[]" value={{ $record_student->id }}>
                <div class="row">
                    <div class="col-sm-1">
                        <input type="number" value="{{ $count }}" class="form-control" disabled readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" value="{{ $record_student->identification }}" class="form-control" disabled readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" value="{{ $record_student->lastnames }}" class="form-control" disabled readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" value="{{ $record_student->names }}" class="form-control" disabled readonly>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" name="note[]" id="note[{{ $count }}]" placeholder="Ingrese la nota" class="form-control" step="1" min="0" max="20" required>
                    </div>
                </div><br>
                @php
                    $count++;
                @endphp 
            @endforeach
            @if ($lapso->upload_note == 1)
                <div class="d-flex justify-content-end p-3">
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Subir Notas">
                </div>
            @else
                <div class="d-flex justify-content-end p-3">
                    El proceso de carga de notas no esta activo
                </div>
            @endif
        </div>
    </form>
@endsection
