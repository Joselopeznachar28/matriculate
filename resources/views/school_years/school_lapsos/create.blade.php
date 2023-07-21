@extends('layouts.form')

@section('content')
    <form action="{{ route('lapso_schools.store' , $academic_period->id) }}" method="POST">
        @csrf
        <!-- Name -->
        <div class="card p-4 border border-4">
            <div class="card-body">
                <h2 class="text-center text-uppercase">Año Escolar</h2><hr>
                <div class="row">
                    <div class="col-sm-4">
                        <label class="form-label">Inicio del Periodo Academico</label>
                        <input class="form-control" value="{{ $academic_period->init }}" disabled autofocus>
                    </div>
                    <div class="col-sm-4">
                        <label class="form-label">Fin del Periodo Academico</label>
                        <input class="form-control" value="{{ $academic_period->end }}" disabled autofocus>
                    </div>
                    <div class="col-sm-4">
                        <input type="hidden" class="form-control" name="academic_period_id" value="{{ $academic_period->id }}" autofocus>
                    </div>
                </div><hr>
                <h2 class="text-center text-uppercase">Fecha de Corte</h2><hr>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="name" class="col-form-label">{{ __('Lapso') }}</label>
                        <select name="name" id="name" class="form-control" required>
                            <option value="">Seleccione una opcion...</option>
                            <option value='1ER LAPSO'>Primer Lapso</option>
                            <option value='2DO LAPSO'>Segundo Lapso</option>
                            <option value='3ER LAPSO'>Tercer Lapso</option>
                        </select>

                        @error('number')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror

                    </div>
                    <div class="col-sm-4">
                        <label for="init" class="col-form-label">{{ __('Inicio de Lapso') }}</label>
                        <input type="date" name="init" id="init" value="{{ old('init') }}" class="form-control" required autofocus>
    
                        @error('init')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                    <div class="col-sm-4">
                        <label for="end" class="col-form-label">{{ __('Fin de Lapso') }}</label>
                        <input type="date" name="end" id="end" value="{{ old('end') }}" class="form-control" required autofocus>
    
                        @error('end')
                            <span style="color: red;">{{ $message }} </span><br/>
                        @enderror
    
                    </div>
                </div>
            </div>
            <div class="row justify-content-end p-3">
                <input type="submit" class="btn btn-primary btn-submit w-25" value="Guardar">
            </div>
        </div>
    </form>
@endsection