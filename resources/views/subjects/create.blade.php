@extends('layouts.form')

@section('content')
    <form action="{{ route('subjets.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4 border border-4">
            <h1 class="text-center text-uppercase">Crear Materia</h1><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre de Materia') }}" required autofocus>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6 ">
                        <label for="year_school_id" class="col-form-label">Año a Impartir la materia</label>
                        <select name="year_school_id" id="year_school_id" class="form-control" required>
                            <option value="">Seleccione un año escolar...</option>
                            @foreach ($year_schools as $year_school)
                            <option value={{ $year_school->id }}>{{ $year_school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><hr>
            <div class="row justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection