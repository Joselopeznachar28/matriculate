<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boletin</title>
</head>
<body>
    <label for="">Materias</label>
    @foreach ($student_record->year_school->subjects as $k => $subject)
            <div class="row">
                <span>{{ $subject->name }}</span>
            </div>
    @endforeach
</body>
</html>