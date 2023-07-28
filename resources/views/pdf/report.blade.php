<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
</head>
<body style="text-transform: uppercase;">
    <div>
        <span style="width: 48%; float: left; font-size: 1.2rem !important; text-transform: uppercase;">Estudiantes Aprobados : {{ $aproved }}</span>
        <span style="width: 48%; float: right; font-size: 1.2rem !important; text-transform: uppercase;">Estudiantes Reprobados : {{ $reproved }}</span>
    </div>
    <h1 style="text-align: center;">Reporte de Alumnos a Detalle</h1><hr>
    @php
        $count = 1;
    @endphp
    <div>
        <table>
            <thead style="text-align: center;">
                <tr>
                    <th style="margin-right: .8rem;">#</th>
                    <th style="margin-right: .8rem;">Año Escolar</th>
                    <th style="margin-right: .8rem;">Seccion</th>
                    <th style="margin-right: .8rem;">Apellidos</th>
                    <th style="margin-right: .8rem;">Nombres</th>
                    <th style="margin-right: .8rem;">Cedula</th>
                    <th style="margin-right: .8rem;">Calif. Final</th>
                </tr>
            </thead>
            <tbody style="text-align: center">
                @foreach ($array as $a)
                    <tr>
                        <td style="margin-right: .8rem;">{{ $count }}</td>
                        <td style="margin-right: .8rem;">{{ $a['year_school'] }}</td>
                        <td style="margin-right: .8rem;">{{ $a['section'] }}</td>
                        <td style="margin-right: .8rem;">{{ $a['student_lastnames'] }}</td>
                        <td style="margin-right: .8rem;">{{ $a['student_names'] }}</td>
                        <td style="margin-right: .8rem;">{{ $a['student_identification'] }}</td>
                        <td style="margin-right: .8rem;">
                            @foreach ($a['noteFinal'] as $noteFinal)
                                <p>{{ $noteFinal }}</p>
                            @endforeach
                        </td>
                    </tr>
                    @php
                        $count++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>