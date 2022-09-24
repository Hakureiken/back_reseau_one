<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formation.edit</title>
</head>
<body>
    <h1>page Edit pour la formation : {{$formation->name}}</h1>
    {{-- {{var_dump($formation)}} --}}

    <form action="{{route('formation.update',$formation)}}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="name" placeholder="name">
        <input type="text" name="content" placeholder="content">
        <input type="date" name="starting_date" placeholder="starting_date">
        <input type="date" name="ending_date" placeholder="ending_date">
        <input type="number" name="document_id" placeholder="document_id">
        <button type="submit">modifier</button>
    </form>

</body>
</html>