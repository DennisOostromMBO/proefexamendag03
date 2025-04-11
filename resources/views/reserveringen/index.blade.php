<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Reserveringen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            margin-right: 20px; /* Add spacing between the header and the form */
        }
        form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reserveringen van Mazin Jamil</h1>
        <form method="GET" action="{{ route('reserveringen.index') }}">
            <label for="from_date">Datum:</label>
            <input type="date" id="from_date" name="from_date" value="{{ $fromDate ?? '' }}">
            <button type="submit">Toon Reserveringen</button>
        </form>
    </div>

    @if ($errorMessage)
        <div class="error">
            <p>{{ $errorMessage }}</p>
        </div>
    @else
        @if (!empty($reserveringen) && $reserveringen->isNotEmpty())
            <table>
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
                            <td>{{ $reservering->aantal_kinderen !== null ? $reservering->aantal_kinderen : 'geen' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endif
</body>
</html>
