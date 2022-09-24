<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document.edit</title>
</head>
<body>
    <form action="{{route('organization.update',$organization)}}" method="post">
        @csrf
        @method('PATCH')
        <input type="text" name="type">
        <button type="submit">Modifier</button>
    </form>
</body>
</html>