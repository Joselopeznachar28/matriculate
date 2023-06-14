@extends('home')

@section('content')
    <div class="container">
        <form action="{{ route('subjets.update', $subject->id) }}" method="POST">
            @csrf
            @method('put')
            <!-- Name -->
            <div class="form">
                <div class="card p-4">
                    <div class="card-header">
                        <h2 class="text-center">Editar Materia</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="name" class="col-form-label">{{ __('Materia') }}</label>
                                <input type="text" name="name" id="name" value="{{ $subject->name }}" class="form-control">
            
                                @error('name')
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