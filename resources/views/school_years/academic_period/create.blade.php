@extends('layouts.form')

@section('content')
    <form action="{{ route('academic_period.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4 border border-4">
            <h1 class="text-center text-uppercase">Agregar Año escolar</h1><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="init" class="col-form-label">{{ __('Inicio de Periodo Academico') }}</label>
                        <input type="date" name="init" id="init" value="{{ old('init') }}" class="form-control" required autofocus>
    
                        @error('init')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-4">
                        <label for="end" class="col-form-label">{{ __('Fin del Periodo Academico') }}</label>
                        <input type="date" name="end" id="end" value="{{ old('end') }}" class="form-control" required autofocus>
    
                        @error('end')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-4 text-center">
                        <label for="year_id" class="col-form-label">{{ __('Año Escolar') }}</label>
                        @foreach ($year_schools as $year_school)
                            <div class="form-check d-flex justify-content-center gap-4">
                                <span class="form-label text-uppercase">{{ $year_school->id }}</span>
                                <input type="checkbox" name="year_id[]" id="year_id" class="form-check-input" value={{ $year_school->id }}>
                            </div>
                        @endforeach
    
                    </div>
                </div>
            </div><hr>
            <div class="row justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection