<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Reserveringen</title>
</head>
<body>
    <h1>Overzicht Reserveringen</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Datum</th>
                <th>Aantal Uren</th>
                <th>Begin Tijd</th>
                <th>Eind Tijd</th>
                <th>Aantal Volwassenen</th>
                <th>Aantal Kinderen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reserveringen as $reservering)
                <tr>
                    <td>{{ $reservering->naam }}</td>
                    <td>{{ $reservering->datum }}</td>
                    <td>{{ $reservering->aantal_uren }}</td>
                    <td>{{ $reservering->begin_tijd }}</td>
                    <td>{{ $reservering->eind_tijd }}</td>
                    <td>{{ $reservering->aantal_volwassen }}</td>
                    <td>{{ $reservering->aantal_kinderen ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
