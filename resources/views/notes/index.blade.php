@extends('home')

@section('content')
    <div class="container">
        <div class="form-students">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Identificacion</th>
                      <th>1er Lapso</th>
                      <th>2do Lapso</th>
                      <th>3er Lapso</th>
                      <th>Promedio</th>
                      <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->names }}</td>
                            <td>{{ $student->lastnames }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->identification }}</td>
                            <td class="d-md-flex justify-content-center gap-2">
                                {{-- <a href="{{ route('notes.create', $student->id) }}" class="btn btn-info mr-2">Cargar Nota</a> --}}
                                <a href="#createNote-{{ $cont }}" class="btn btn-info mr-2" data-bs-toggle="modal">Cargar Nota</a>
                                {{-- <a href="{{route('notes.edit',$student->id)}}" class="btn btn-warning mr-2">Editar</a> --}}
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="createNote-{{ $cont }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h3 class="modal-title text-uppercase text-bold">{{ $student->names }}</h3>
                                        <h3 class="modal-title text-uppercase text-bold">C.I: {{ $student->identification }}</h3>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="{{ route('notes.store', $student->id) }}" method="POST">
                                            @csrf
                                            
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">{{ __('Materia') }}</label>
                                                    <select name="subject_id" id="subject_id" class="form-control">
                                                        <option disabled selected>Seleccion una opcion...</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">{{ __('Seccion') }}</label>
                                                    <select name="section_id" id="section_id" class="form-control">
                                                        <option disabled selected>Seleccion una opcion...</option>
                                                    </select>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label for="" class="form-label">{{ __('Materia') }}</label>
                                                        <input type="text">
                                                    </div>
                                                    <div class="col-sm-6">
                                                    
                                                    </div>
                                                </div>
                                            </form>
                                                
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $cont++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection