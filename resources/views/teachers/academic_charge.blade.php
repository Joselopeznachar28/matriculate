@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>Año Escolar</th>
                      <th>Materia</th>
                      <th>Seccion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($array as $arr)
                        <tr>
                            <td>{{ $arr['subject']->name }}</td>
                            <td>{{ $arr['year_school']->name }}</td>
                            <td>
                                <a href="{{ route('notes_charge',[
                                    'year_school_id' => $arr['year_school']->id,
                                    'subject_id' => $arr['subject']->id,
                                    'section_id' => $arr['section']->id
                                ])}}" style="text-decoration: none; color:#ffffff;">
                                    {{ $arr['section']->letter }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection