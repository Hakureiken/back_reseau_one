<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document.index</title>
</head>
<body>
    @foreach ($propales as $propale)

        @if ($propale -> is_accepted && $propale -> is_validated)
            {{var_dump('Oui la propale "'.$propale->name_devis.'" a été acceptée : ' . $propale -> is_accepted . ' et validée : '.$propale -> is_validated)}}
        @elseif ($propale -> is_accepted && !($propale -> is_validated))
            {{var_dump('Oui la propale "'.$propale->name_devis.'" a été acceptée : ' . $propale -> is_accepted . ' mais pas validée : '.$propale -> is_validated)}}
        @elseif (!($propale -> is_accepted) && $propale -> is_validated)
            {{var_dump('Oui la propale "'.$propale->name_devis.'" n\'a pas été acceptée : ' . $propale -> is_accepted . ' mais a été validée : '.$propale -> is_validated)}}
        @else
            {{var_dump('Oui la propale "'.$propale->name_devis.'" n\'a pas été acceptée : ' . $propale -> is_accepted . ' ni validée : '.$propale -> is_validated)}}
        @endif
        
    @endforeach
</body>
</html>