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
                                <label for="name" class="col-form-label">{{ __('Año Estudiantil') }}</label>
                                <input type="number" name="year" id="year" value="{{ old('year') }}" class="form-control" placeholder="{{ __('Nombre de Materia') }}" required autofocus>
            
                                @error('year')
                                    <span style="color: red;">{{ $message }} </span><br/>
                                @enderror
            
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