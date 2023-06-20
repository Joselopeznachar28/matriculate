@extends('layouts.form')

@section('content')
    <div class="container">
        <form action="{{ route('subjets.store') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="card p-4">
                <h1 class="text-center text-uppercase">Crear Materia</h1>  
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre de Materia') }}" required autofocus>
        
                            @error('name')
                                <span style="color: red;">{{ $message }} </span><br/>
                            @enderror
        
                        </div>
                        <div class="col-sm-8">
                            <label for="year_id" class="col-form-label">Años a Impartir la materia</label><br>
                            @foreach ($years as $year)
                                <div class="form-check">
                                    <input type="checkbox" name="year_id[]" id="year_id" class="form-check-input" value={{ $year->id }}>
                                    <span class="form-label text-uppercase">{{ $year->year }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
                <div class="row justify-content-end p-3">
                    <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                </div>
            </div>
        </form>
    </div>
@endsection