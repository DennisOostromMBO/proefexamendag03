<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Banen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
        .edit-button {
            text-decoration: none;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }
        .edit-icon {
            width: 16px;
            height: 16px;
            fill: black; /* Normal black pencil icon */
        }
    </style>
</head>
<body>
    <h1>Overzicht Banen</h1>

    @if ($errors->any())
        <div class="error">
            <p>{{ $errors->first('message') }}</p>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Datum</th>
                    <th>Volwassenen</th>
                    <th>Kinderen</th>
                    <th>Baan</th>
                    <th>Wijzig</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banen as $baan)
                    <tr>
                        <td>{{ $baan->naam }}</td>
                        <td>{{ $baan->datum }}</td>
                        <td>{{ $baan->aantal_volwassen }}</td>
                        <td>{{ $baan->aantal_kinderen ?? 'geen' }}</td>
                        <td>{{ $baan->baan }}</td>
                        <td>
                            <a href="#" class="edit-button">
                                <svg class="edit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M3 17.25V21h3.75l11.06-11.06-3.75-3.75L3 17.25zm2.92 2.92H4.5v-1.42l9.06-9.06 1.42 1.42-9.06 9.06zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
