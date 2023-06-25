@extends('layouts.form')

@section('content')
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT');
        <div class="card p-4 text-center">
            <h2 class="text-center text-uppercase">Crear Profesor</h2><hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name" class="form-label">{{ __('Nombres') }}</label>
                        <input type="text" name="name" id="name" value="{{ $teacher->name }}" class="form-control" placeholder="{{ __('Ingresar Nombres') }}" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="lastname" class="form-label">{{ __('Apellidos') }}</label>
                        <input type="text" name="lastname" id="lastname" value="{{ $teacher->lastname }}" class="form-control" placeholder="{{ __('Ingresar Apellidos') }}" required>
    
                        @error('lastname')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="identification" class="form-label">{{ __('Identificacion') }}</label>
                        <input type="number" name="identification" id="identification" value="{{ $teacher->identification }}" class="form-control" placeholder="{{ __('Ingresar Numero de Identidad') }}" required>
    
                        @error('identification')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-6">
                        <label for="email" class="form-label">{{ __('Correo Electronico') }}</label>
                        <input type="email" name="email" id="email" value="{{ $teacher->email }}" class="form-control" placeholder="{{ __('Ingresar Correo Electronico') }}" required>
    
                        @error('email')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
                {{-- <div class="display-grid">
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
                </div><br>
                <div class="display-grid" id="addOthers">

                </div> --}}
            </div>
            <div class="d-flex justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
                {{-- <input type="button" class="btn btn-primary btn-submit w-25" value="Agregar Materia" onclick="addMoreSubjects()" id="buttomAdd"> --}}
            </div>
        </div>
    </form>
    {{-- <script src="/js/teachers.js"></script> --}}
@endsection
    {{-- <script>
        const subjects = @json($subjects);
    </script> --}}
