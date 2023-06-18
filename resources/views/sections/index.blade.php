@extends('home')

@section('content')
    <div class="container">
        <div class="form">
            <table class="table table-dark table-hover text-center">
                <thead>
                    <tr>
                      <th>Seccion</th>
                      <th>Materia</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sections as $section)
                        @foreach ($section->subjects as $subject)
                            <tr>
                                <td>{{ $section->letter }}</td>
                                <td>{{ $subject->name }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
@endsection