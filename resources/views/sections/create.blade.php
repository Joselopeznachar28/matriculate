@extends('layouts.form')

@section('content')
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Crear Seccion</h2><hr>
            <div class="card-body">
                <div class="row">
                    <!-- periodo academico -->
                    <div class="col-sm-3">
                        <label for="academic_period_id" class="col-form-label">{{ __('Periodo Academico') }}</label>
                        <input  name="academic_period_id" id="academic_period_id" value="{{ $academic_period->id }}" class="form-control" placeholder="{{ $academic_period->name }}" readonly autofocus>
    
                        @error('academic_period_id')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-3">
                        <label class="col-form-label">Año Escolar</label>
                        <select name="year_school_id" id="year_school_id" class="form-control" required>
                            @foreach ($year_schools as $year_school)
                                <option value="{{ $year_school->id }}">{{ $year_school->name }}</option>
                            @endforeach
                            <option disabled selected>{{ __('Seleccione un año escolar...') }}</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="col-form-label">Materias</label>
                        <select name="subject_id" id="subject_id" class="form-control" required>
                            @foreach ($year_schools as $year_school)
                                <option disabled class="bg-black text-white text-uppercase">{{ $year_school->name }}</option>
                                @foreach ($year_school->subjects as $subject)
                                    @if ($year_school->id === $subject->year_school_id)
                                        <option class="text-uppercase" value="{{ $subject->id }}">{{"( $subject->code )" . ' ' . $subject->name  }} </option>
                                    @endif
                                @endforeach
                            @endforeach
                            <option disabled selected>{{ __('Seleccione una materia...') }}</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="letter" class="col-form-label">{{ __('Asignar Seccion') }}</label>
                        <input type="text" name="letter" id="letter" value="{{ old('letter') }}" class="form-control" placeholder="{{ __('Ingrese la Letra') }}" required autofocus>
    
                        @error('letter')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
            </div><hr>
            <div class="row justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection