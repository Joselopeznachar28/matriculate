<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia de Inscripcion</title>
</head>

<style>
    span{
        padding-right: 5px;
    }
</style>

<body style="font-size: 14px">
    <div style="text-align: center; text-transform: uppercase">
        <div>
            <span>republica bolivariana de venezuela</span><br>
            <span>ministerio del poder popular para la educacion</span><br>
            <span>u.e "manuel placido maneiro"</span><br>
            <span>jusepin - estado monagas</span><br>
        </div>
    </div>
    <br>
    <br>

    <div style="text-transform: uppercase; border: solid 1px; padding: 1rem">
        <!-- nombres y apellidos -->
        <div style="text-align: center;">
            <span style="width: 33.3%;">N° de inscripcion: <span style="border-bottom: solid 2px;">{{ $student->inscription_number }}</span></span>
            <span style="width: 33.3%;">Año a cursar: <span style="border-bottom: solid 2px;">{{ $student->year->id }}</span></span>
            <span style="width: 33.3%;">estudiante: <span style="border-bottom: solid 2px;">{{ $student->ty }}</span></span>
        </div><br>
        <h2 style="border-bottom: solid 1px; text-align: center; margin-top: 0px;">ficha de inscripcion del estudiante</h2>
        <div style="text-align: center;">
            <span style="width: 50%;">Apellidos: <span style="border-bottom: solid 2px;">{{ $student->lastnames }}</span></span>
            <span style="width: 50%;">Nombres: <span style="border-bottom: solid 2px;">{{ $student->names }}</span></span>
        </div><br>

        <div>
            <span style="width: 25%;">Cedula: <span style="border-bottom: solid 2px;">{{ $student->identification }}</span></span>
            <span style="width: 25%;">Genero: <span style="border-bottom: solid 2px;">{{ $student->gender }}</span></span>
            <span style="width: 25%;">FEC. DE NAC.: <span style="border-bottom: solid 2px;">{{ $student->birthdate }}</span></span>
            <span style="width: 25%;">LUG. DE NAC.: <span style="border-bottom: solid 2px;">{{ $student->place_of_birth }}</span></span>
        </div><br>

        <div>
            <span style="width: 25%;">municipio: <span style="border-bottom: solid 2px;">{{ $student->municipality }}</span></span>
            <span style="width: 25%;">estado: <span style="border-bottom: solid 2px;">{{ $student->state }}</span></span>
            <span style="width: 25%;">lateralidad: <span style="border-bottom: solid 2px;">{{ $student->laterality }}</span></span>
            <span style="width: 25%;">ord. de nac.: <span style="border-bottom: solid 2px;">{{ $student->birth_order }}</span></span>
        </div><br>

        <div>
            <span style="width: 20%;">calzado: <span style="border-bottom: solid 2px;">{{ $student->footwear }}</span></span>
            <span style="width: 20%;">pantalon: <span style="border-bottom: solid 2px;">{{ $student->pants }}</span></span>
            <span style="width: 20%;">camisa: <span style="border-bottom: solid 2px;">{{ $student->shirt }}</span></span>
            <span style="width: 20%;">med. braquial: <span style="border-bottom: solid 2px;">{{ $student->brachial_measure }}</span></span>
            <span style="width: 20%;">peso: <span style="border-bottom: solid 2px;">{{ $student->weight }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">Padece de alguna enfermedad: <span style="border-bottom: solid 2px;">{{ $student->disease }}</span></span>
        </div><br>

        <div>
            <span style="width: 50%;">correo: <span style="border-bottom: solid 2px;">{{ $student->email }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">Repite Con: <span style="border-bottom: solid 2px;">{{ $student->repeat_with }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">materia pendiente: <span style="border-bottom: solid 2px;">{{ $student->pending_matter }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">procedencia del plantel educativo: <span style="border-bottom: solid 2px;">{{ $student->school_background }}</span></span>
        </div>

        <div>
            <h3>direccion del estudiante</h3>
            <span style="width: 33.3%;">estado: <span style="border-bottom: solid 2px;">{{ $student->state_actual }}</span></span>
            <span style="width: 33.3%;">municipio: <span style="border-bottom: solid 2px;">{{ $student->municipality_actual }}</span></span>
            <span style="width: 33.3%;">parroquia: <span style="border-bottom: solid 2px;">{{ $student->parish_actual }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">sector: <span style="border-bottom: solid 2px;">{{ $student->sector }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">punto de referencia: <span style="border-bottom: solid 2px;">{{ $student->reference_point }}</span></span>
        </div>

        <div>
            <h3>registro del representante legal</h3>
            <span style="width: 33.3%;">apellidos: <span style="border-bottom: solid 2px;">{{ $student->pattern_lastnames }}</span></span>
            <span style="width: 33.3%;">nombres: <span style="border-bottom: solid 2px;">{{ $student->pattern_names }}</span></span>
            <span style="width: 33.3%;">cedula: <span style="border-bottom: solid 2px;">{{ $student->pattern_identification }}</span></span>
        </div><br>

        <div>
            <span style="width: 50%;">fecha de nac.: <span style="border-bottom: solid 2px;">{{ $student->pattern_birthdate }}</span></span>
            <span style="width: 50%;">lugar de nac.: <span style="border-bottom: solid 2px;">{{ $student->pattern_place_of_birth }}</span></span>
        </div><br>

        <div>
            <span style="width: 25%;">edo. de nac.: <span style="border-bottom: solid 2px;">{{ $student->pattern_state_of_birth }}</span></span>
            <span style="width: 25%;">sexo: <span style="border-bottom: solid 2px;">{{ $student->pattern_gender }}</span></span>
            <span style="width: 25%;">estado civil: <span style="border-bottom: solid 2px;">{{ $student->pattern_civil_status }}</span></span>
            <span style="width: 25%;">afinidad: <span style="border-bottom: solid 2px;">{{ $student->pattern_affinity }}</span></span>
        </div><br>

        <div>
            <span style="width: 50%;">profesion u oficio: <span style="border-bottom: solid 2px;">{{ $student->pattern_profession }}</span></span>
            <span style="width: 50%;">telefono: <span style="border-bottom: solid 2px;">{{ $student->pattern_phone }}</span></span>
        </div><br>

        <div>
            <span style="width: 33.3%;">inscripcion realizada por: <span style="border-bottom: solid 2px;">{{ $student->registration_made_by }}</span></span>
            <span style="width: 33.3%;">fecha: <span style="border-bottom: solid 2px;">{{ $student->inscription_date }}</span></span>
        </div><br>

        <div>
            <span style="width: 100%;">firma del representante: <span>1° __________ 2° __________ 3° __________ 4° __________ 5° __________</span></span>
        </div><br>

        
        <div>
            <span style="width: 100%;">observaciones: 
                <br><br>
                <span>_________________________________________________________________________________________________</span><span>
                <br><br>
                <span>_________________________________________________________________________________________________</span>
        </div><br>
    </div>

</body>
</html>