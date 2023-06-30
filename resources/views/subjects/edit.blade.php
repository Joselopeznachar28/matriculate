@extends('layouts.form')

@section('content')
    <form action="{{ route('subjets.update', $subject->id) }}" method="POST">
        @csrf
        @method('put')
        <!-- Name -->
        <div class="card p-4">
            <h2 class="text-center text-uppercase">Editar Materia</h2><hr>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                        <input type="text" name="name" id="name" value="{{ $subject->name }}" class="form-control" required>
    
                        @error('name')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
            </div>
            <div class="row justify-content-center p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection