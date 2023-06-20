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
            <span>jusepin - estado monagas</span><br>
        </div>
    </div><br>
    <br>
    <br>
    <br>
    <br>

    <div style="text-transform: uppercase; border: solid 1px; text-align: center;">
        <h4 style="border-bottom: solid 1px">ficha de inscripcion del estudiante</h4>
        <span style="float: left;">Apellidos : {{ $student->lastnames }}</span>
        <span style="float: right;">Nombres : {{ $student->names }}</span>
    </div>
</body>
</html>