<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document.create</title>
</head>
<body>
    <form action="{{route('propale.store')}}" method="post">
        @csrf
        <input type="text" name="name_devis" placeholder="name_devis">
        <input type="number" name="commande_id" placeholder="commande_id">
        <input type="checkbox" name="is_accepted" id="accepted" value="1">
        <label for="accepted">Accepté</label>
        <input type="checkbox" name="is_validated" id="validated" value="1">
        <label for="validated">Validé</label>
        <button type="submit">Créer</button>
    </form>
</body>
</html>