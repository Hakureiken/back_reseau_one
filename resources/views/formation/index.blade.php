<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formations.edit</title>
</head>
<body>

    @foreach ($formations as $formation)
        {{var_dump($formation -> id)}}
    @endforeach
</body>
</html>