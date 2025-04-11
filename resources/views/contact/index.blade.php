<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Klanten</title>
</head>
<body>
    <h1>Overzicht Klanten</h1>

    <form method="GET" action="{{ route('klanten.index') }}">
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" value="{{ request('datum') }}" />

        <button type="submit">Tonen</button>
    </form>

    @if ($noData)
        <p style="color: red;">Er is geen informatie beschikbaar voor deze geselecteerde datum.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Roepnaam</th>
                    <th>Mobiel</th>
                    <th>E-mail</th>
                    <th>Volwassen</th>
                    <th>wijzig</th> <!-- New column -->
                </tr>
            </thead>
            <tbody>
                @foreach ($klanten as $klant)
                    <tr>
                        <td>{{ $klant->Voornaam }}</td>
                        <td>{{ $klant->Tussenvoegsel ?? '' }}</td>
                        <td>{{ $klant->Achternaam }}</td>
                        <td>{{ $klant->Roepnaam }}</td>
                        <td>{{ $klant->Mobiel }}</td>
                        <td>{{ $klant->Email }}</td>
                        <td>{{ $klant->IsVolwassen ? 'Ja' : 'Nee' }}</td>
                        <td>
                            <a href="{{ route('klanten.edit', $klant->id) }}" title="Wijzigen">✏️</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
