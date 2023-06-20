@extends('layouts.form')

@section('content')
    <form action="{{ route('sections.store') }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Crear Seccion</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="letter" class="col-form-label">{{ __('Asignar Seccion') }}</label>
                        <input type="text" name="letter" id="letter" value="{{ old('letter') }}" class="form-control" placeholder="{{ __('Ingrese la Letra') }}" required autofocus>
    
                        @error('letter')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-8 text-center">
                        <label class="col-form-label">Elegir Materias</label>
                        @foreach ($subjects as $subject)
                            <div class="form-check d-flex justify-content-center gap-4">
                                <span class="form-label text-uppercase">{{ $subject->name }}</span>
                                <input type="checkbox" name="subject_id[]" id="subject_id" class="form-check-input" value={{ $subject->id }}>
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