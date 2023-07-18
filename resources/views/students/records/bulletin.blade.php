<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boletin</title>
</head>
<body>
    <div style="column-gap: 10px;">
        <div style="width: 48%;  float: left;">
            <!-- primer momento pedagogico -->
            <span>I MOMENTO PEDAGOGICO</span><br>
            <span>Observaciones / Recomendaciones</span><br>
            <span>____________________________________________</span><br>
            <span>____________________________________________</span><br>
            <span>G.C.R.P ( )</span> <span>O.C ( )</span> <span>C.E ( )</span><br><br><br>
            <span style="border-top: 2px solid #000000; margin-right: 2rem;">Profesor(a) Guia</span> <span style="border-top: 2px solid #000000; margin-right: 2rem;">Representante</span><span style="border-top: 2px solid #000000; margin-right: 2rem;">Fecha</span><br><br>
            <!-- segundo momento pedagogico -->
            <span>II MOMENTO PEDAGOGICO</span><br>
            <span>Observaciones / Recomendaciones</span><br>
            <span>____________________________________________</span><br>
            <span>____________________________________________</span><br>
            <span>G.C.R.P ( )</span> <span>O.C ( )</span> <span>C.E ( )</span><br><br><br>
            <span style="border-top: 2px solid #000000; margin-right: 2rem;">Profesor(a) Guia</span> <span style="border-top: 2px solid #000000; margin-right: 2rem;">Representante</span><span style="border-top: 2px solid #000000; margin-right: 2rem;">Fecha</span><br><br>
            <!-- tercer momento pedagogico -->
            <span>III MOMENTO PEDAGOGICO</span><br>
            <span>Observaciones / Recomendaciones</span><br>
            <span>____________________________________________</span><br>
            <span>____________________________________________</span><br>
            <span>G.C.R.P ( )</span> <span>O.C ( )</span> <span>C.E ( )</span><br><br><br>
            <span style="border-top: 2px solid #000000; margin-right: 2rem;">Profesor(a) Guia</span> <span style="border-top: 2px solid #000000; margin-right: 2rem;">Representante</span><span style="border-top: 2px solid #000000; margin-right: 2rem;">Fecha</span>
            <h4 style="text-align: center;">EVALUACION CUALITATIVA</h4>
            <p>A - Evidencia un excelente desarrollo de sus potencialidades, tomando en cuenta su participacion individual y colectiva, durante los procesos de aprendizaje.</p>
            <p>B - Evidencia un buen desarrollo de sus potencialidades, tomando en cuenta su participacion individual y colectiva, durante los procesos de aprendizaje. Debe continuar fortaleciendo los procesos de aprendizaje.</p>
            <p>C - Evidencia un satisfactorio desarrollo de sus potencialidades, tomando en cuenta su participacion individual y colectiva, durante los procesos de aprendizaje. Requiere reorientacion para la consolidacion de los procesos de aprendizaje.</p>
            <p>D - Evidencia un aceptable desarrollo de sus potencialidades, tomando en cuenta su participacion individual y colectiva, durante los procesos de aprendizaje. Requiere reforzar y reorientar para la consolidacion de los procesos de aprendizaje.</p>
        </div>
        <div style="width: 48%; float: right; text-transform: uppercase !important;">
            <div style="text-align: center;">
                <span><span>republica bolivariana de venezuela</span></span><br>
                <span>ministerio del poder popular para la educacion</span><br>
                <span>u.e " manuel placido maneiro "</span><br>
                <span>jusepin estado monagas</span><br>
                <span>circuito n° 03</span><br><br>
                <input style="height: 120px; width: 90px; border: 2px solid #000000;">
                <h3>boletin informativo</h3>
            </div>
            <h3>datos del alumno</h3>
            <p>Apellidos : <span style="border-bottom: 2px solid #000000; margin-right: 2rem;">{{ $student_record->lastnames }}</span></p>
            <p>Nombres : <span style="border-bottom: 2px solid #000000; margin-right: 2rem;">{{ $student_record->names }}</span> </p>
            <span style="width: 48%;">C.I: <span style="border-bottom: 2px solid #000000; margin-right: 2rem;">{{ $student_record->identification }}</span></span>
            <span style="width: 48%;">Fecha de Nac:<span style="border-bottom: 2px solid #000000;">{{ $student_record->birthdate }}</span></span><br><br>
            <span style="width: 33% !important;">Edad: <span style=" border-bottom: 2px solid #000000;">{{ $date }}</span></span>
            <span style="width: 33% !important;">Grado:<span style="border-bottom: 2px solid #000000;">________</span></span>
            <span style="width: 33% !important;">Seccion: <span style="border-bottom: 2px solid #000000;">{{ $section->letter }}</span></span><br>
            <p>Numero de Lista:<span style="border-bottom: 2px solid #000000;">_________</span></p>
            <h3>datos del representante</h3>
            <p>Apellidos : <span style="border-bottom: 2px solid #000000;">{{ $student_record->pattern_lastnames }}</span></p>
            <p>Nombres : <span style="border-bottom: 2px solid #000000;">{{ $student_record->pattern_names }}</span> </p>
            <p>C.I : <span style="border-bottom: 2px solid #000000;">{{ $student_record->pattern_identification }}</span> </p>
            <p>Direccion : <span style="border-bottom: 2px solid #000000;">{{ $student_record->state_actual . ', ' . $student_record->parish_actual . ', ' . $student_record->municipality_actual . ', ' . $student_record->sector . ', ' . $student_record->reference_point }}</span> </p>
            <p>Telefono : <span style="border-bottom: 2px solid #000000;">{{ $student_record->pattern_phone }}</span> </p>
            <p>Docente (Guia) : <span style="border-bottom: 2px solid #000000;">_____________________</span> </p>
            <p>Director : <span style="border-bottom: 2px solid #000000;">____________________________</span> </p>
            <p style="text-align: center !important;">Año Escolar : <span style="border-bottom: 2px solid #000000;">{{ $student_record->year_school->name }}</span> </p>

        </div>
    </div>
    <div style="page-break-before: always;">
        <table style="text-align: center;">
            <thead style="text-transform: uppercase;">
                <tr>
                    <th style="border: #000000 solid 1px;">Areas de Formacion</th>
                    <th style="border: #000000 solid 1px;">1er Lapso</th>
                    <th style="border: #000000 solid 1px;">2do Lapso</th>
                    <th style="border: #000000 solid 1px;">3er Lapso</th>
                    <th style="border: #000000 solid 1px;">Definitiva</th>
                    <th style="border: #000000 solid 1px;">Calif. Revision</th>
                    <th style="border: #000000 solid 1px;">Fecha de Revision</th>
                    <th style="border: #000000 solid 1px;">Firma del coord. de eval.</th>
                </th>
            </thead>
            <tbody>
                <tr>
                    <td style="border: #000000 solid 1px;">
                        @foreach ($subjects as $subject)
                           <p>{{ $subject->name }}</p> 
                        @endforeach 
                    </td>
                    <td style="border: #000000 solid 1px;">
                        @foreach ($notes as $note)
                                <p>{{ $note->note }}</p>
                        @endforeach 
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead style="text-transform: uppercase;">
                <tr>
                    <th style="padding: .2rem; border: #000000 solid 1px;">Materia Pendiente</th>
                    <th style="padding: .2rem; border: #000000 solid 1px;">1er momento fecha</th>
                    <th style="padding: .2rem; border: #000000 solid 1px;">2do momento fecha</th>
                    <th style="padding: .2rem; border: #000000 solid 1px;">3er momento fecha</th>
                    <th style="padding: .2rem; border: #000000 solid 1px;">4to momento fecha</th>
                    <th style="padding: .2rem; border: #000000 solid 1px;">firma del coord. de eval.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                </tr>
                <tr>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                    <td style="border: #000000 solid 1px; height: 25px;"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <span>" La Educacion Integral es un modelo pedagógico, cuyo objetivo principal es desarrollar la total personalidad de hombres y mujeres "</span><br>
    <span style="float: right;">" BELEN SAN JUAN "</span>

</body>
</html>