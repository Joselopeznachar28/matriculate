@extends('home')

@section('content')
    <div class="container">
        <form action="{{ route('subjets.store') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="form">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Crear Materia</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre de Materia') }}" required autofocus>
            
                                @error('name')
                                    <span style="color: red;">{{ $message }} </span><br/>
                                @enderror
            
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="year_id" class="form-label">Años a Impartir la materia</label><br>
                                @foreach ($years as $year)
                                <div class="row w-100">
                                    <div class="form-switch d-flex justify-content-evenly column-gap-1">
                                        <p>{{ $year->year }}</p>
                                        <input type="checkbox" name="year_id[]" id="year_id" class="form-check-input" value={{ $year->id }}>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary btn-submit" value="Guardar">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection