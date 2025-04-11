<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Klanten</title>
</head>
<body>
    <h1>Overzicht Klanten</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Mobiel</th>
                <th>Email</th>
                <th>Volwassen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($klanten as $klant)
                <tr>
                    <td>
                        {{ $klant->Voornaam }}
                        {{ $klant->Tussenvoegsel ?? '' }}
                        {{ $klant->Achternaam }}
                    </td>
                    <td>{{ $klant->Mobiel }}</td>
                    <td>{{ $klant->Email }}</td>
                    <td>{{ $klant->IsVolwassen ? 'J' : 'V' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
