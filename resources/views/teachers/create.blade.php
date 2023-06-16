@extends('home')

@section('content')
    <div class="container">
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <!-- Name -->
            <div class="form">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Crear Profesor</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name" class="col-form-label">{{ __('Profesor') }}</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre y Apellido') }}">
            
                                @error('name')
                                    <span style="color: red;">{{ $message }} </span><br/>
                                @enderror
            
                            </div>
                        </div><hr>
                        <div>
                            <h2 class="text-center">Asignar Materias</h2>
                            @foreach ($subjects as $subject)
                                <div class="row w-100">
                                    <div class="form-switch d-flex justify-content-evenly column-gap-1">
                                        <p>{{ $subject->name }}</p>
                                        <input type="checkbox" name="subject_id[]" id="subject_id" class="form-check-input" value={{ $subject->id }}>
                                    </div>
                                </div>
                            @endforeach
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