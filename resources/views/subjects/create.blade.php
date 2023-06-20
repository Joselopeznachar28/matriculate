@extends('layouts.form')

@section('content')
    <form action="{{ route('subjets.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4 border border-4">
            <h1 class="text-center text-uppercase">Crear Materia</h1><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre de Materia') }}" required autofocus>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-8 text-center">
                        <label for="year_id" class="col-form-label">Años a Impartir la materia</label>
                        @foreach ($years as $year)
                            <div class="form-check d-flex justify-content-center gap-4">
                                <span class="form-label text-uppercase">{{ $year->year }}</span>
                                <input type="checkbox" name="year_id[]" id="year_id" class="form-check-input" value={{ $year->id }}>
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