@extends('home')

@section('content')
    @section('search-route')
        {{route('lapso_schools.index')}}
    @endsection
    <div class="container">
        <div class="form-students"style="left: 35%; ">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>Inicio Año Escolar</th>
                      <th>Fin Año Escolar</th>
                      <th>Lapso</th>
                      <th>Inicio</th>
                      <th>Fin</th>
                      <th>Permiso - Cargar Notas</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($academic_periods as $academic_period)
                        @foreach ($academic_period->lapsos as $lapso)
                            <tr>
                                <td>{{ $lapso->id }}</td>
                                <td>{{ $academic_period->init }}</td>
                                <td>{{ $academic_period->end }}</td>
                                <td>{{ $lapso->name }}</td>
                                <td>{{ $lapso->init }}</td>
                                <td>{{ $lapso->end }}</td>
                                <td>
                                    <div class="form-chex form-switch">
                                        <input type="checkbox" data-id="{{$lapso->id}} "class="toggle-class form-check-input" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$lapso->upload_note == True ? 'checked' : ''}}>
                                    </div>
                                </td>
                                    <td>
                                        <span>{{ $lapso->upload_note == True ? 'Disponible' : 'No Disponible' }}</span>
                                    </td>
                            </tr>
                        @endforeach
                    @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content-between"><b>{{$academic_periods->links()}}</b></div>
        </div>
    </div>

    <script>
        $('.toggle-class').on('change', function () {
            var upload_note = $(this).prop('checked') == true ? 1 : 0;
            var lapso_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('changeStatus')}}',
                data : {
                    'upload_note' : upload_note,
                    'lapso_id' : lapso_id,
                },
                success:function(data) {
                    console.log('El presupuesto de la compra fue enviado!');
                }
            });
        });
    </script>

@endsection