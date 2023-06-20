@extends('layouts.form')

@section('content')
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div class="card p-4 text-center">
            <h2 class="text-center text-uppercase">Crear Profesor</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <label for="name" class="form-label">{{ __('Profesor') }}</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{ __('Nombre y Apellido') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div><br>
                <div class="display-grid">
                    <div>
                        <label for="subject_id" class="form-label">Asignar Materia</label>
                        <select name="subject_id[0]" id="subject_id0" class="form-control" required >
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                            <option disabled selected>Seleccione una opcion...</option>
                        </select>
                    </div>
                    <div>
                        <label for="section_id" class="form-label">Elegir Seccion</label>
                        <select name="section_id[0]" id="section_id0" class="form-control" required>
                            
                        </select>
                    </div>
                </div>
                <div class="display-grid" id="addOthers">

                </div>
            </div>
            <div class="d-flex justify-content-around p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                <input type="button" class="btn btn-primary btn-submit w-25" value="Agregar Materia" onclick="addMoreSubjects()" id="buttomAdd">
            </div>
        </div>
    </form>
    <script src="/js/teachers.js"></script>
@endsection
    <script>
        const subjects = @json($subjects);
    </script>
