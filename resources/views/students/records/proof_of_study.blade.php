<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia</title>
</head>
<body>
    <div style="text-align: center; text-transform: uppercase">
        <div>
            <span>republica bolivariana de venezuela</span><br>
            <span>ministerio del poder popular para la educacion</span><br>
            <span>u.e "manuel placido maneiro"</span><br>
            <span>parroquia jusepin - municipio maturin</span><br>
            <span>estado monagas</span><br>
            <span>circuito escolar n°. 03</span><br>
        </div>
    
        <h2><b style="border-bottom: #000 solid 2px;">constancia de estudio</b></h2><br>

    </div>

    <div style="text-align: justify; text-indent: 40px;">

        <p>Quien Suscribe: YECENIA J. CALDERON V. Directora (E) de la U.E. "Manuel Placido Maneiro", que funciona en Jusepin Estado Monagas, hace constar por medio de la presente que el Alumnno(a): <span style="text-transform: uppercase;border-bottom: #000 solid 2px;">{{ $student->lastnames . ' ' . $student->names }}</span>, Titular de la Cedula de Identidad N°.: <span style="border-bottom: #000 solid 2px;">V-{{ $student->identification }}</span>, de <span style="border-bottom: #000 solid 2px;">{{ $date }}</span> años de edad, esta inscrito(a) en este Plantel para cursar el año, correspondiente al Periodo Escolar: <span style="border-bottom: #000 solid 2px;">{{ $academic_period->init}} / {{ $academic_period->end }}</span> .</p>

        <p>Constancia que se expide a peticion de parte interesada, en Jusepin a los {{ now()->day }} dias del mes {{ now()->month }} del año {{ now()->year }}.</p>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="text-align: center; text-transform: uppercase">
        <b>
            <span style="border-top: #000 solid 2px;">yecenia j. calderon v.</span><br>
            <span>directora (e)</span><br>
            <span>c.i. n°. v-6494540</span><br>
        </b>
    </div>
</body>
</html>