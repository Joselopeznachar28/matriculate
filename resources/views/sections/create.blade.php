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
                    <div class="col-sm-4">
                        <label for="academic_period_id" class="col-form-label">{{ __('Periodo Academico') }}</label>
                        @if (!empty($academic_period))
                            <input  name="academic_period_id" id="academic_period_id" value="{{ $academic_period->id }}" class="form-control" placeholder=" {{ $academic_period->name }}" readonly autofocus>
                        @else
                            <h6>Se requiere un periodo academico para gestionar las secciones</h6>
                        @endif
    
                        @error('academic_period_id')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-4">
                        <label class="col-form-label">Año Escolar</label>
                        <select name="year_school_id" id="year_school_id" class="form-control" required>
                            <option value="">{{ __('Seleccione un año escolar...') }}</option>
                            @foreach ($year_schools as $year_school)
                                <option value="{{ $year_school->id }}">{{ $year_school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="letter" class="col-form-label">{{ __('Asignar Seccion') }}</label>
                        <input type="text" name="letter" id="letter" value="{{ old('letter') }}" class="form-control" placeholder="{{ __('Ingrese la Letra') }}" required autofocus>
    
                        @error('letter')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
            </div><hr>
            <div class="row justify-content-end p-3">
                @if (!empty($academic_period))
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                @endif
            </div>
        </div>
    </form>
@endsection