<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formation.show</title>
</head>
<body>
    <h1>Page show de la formation : {{$formation -> name}}</h1>
    <span>id : {{$formation -> id}}</span>
    <div>content : {{$formation -> content}}</div>
    <form action="{{route('formation.destroy', $formation)}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Supprimer</button>
    </form>
</body>
</html>