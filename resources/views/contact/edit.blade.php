<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 250px;
            padding: 5px;
        }
        .form-row {
            margin-bottom: 10px;
        }
        .checkbox-row {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }
        .checkbox-row label {
            width: auto;
            margin-right: 10px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h2>Klant details</h2>

    <form method="POST" action="{{ route('klanten.update', $klant->id) }}">
        @csrf
        @method('PUT')

        <div class="form-row">
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" value="{{ $klant->Voornaam }}">
        </div>

        <div class="form-row">
            <label for="tussenvoegsel">Tussenvoegsel:</label>
            <input type="text" id="tussenvoegsel" name="tussenvoegsel" value="{{ $klant->Tussenvoegsel }}">
        </div>

        <div class="form-row">
            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" value="{{ $klant->Achternaam }}">
        </div>

        <div class="form-row">
            <label for="mobiel">Mobiel:</label>
            <input type="tel" id="mobiel" name="mobiel" value="{{ $klant->Mobiel }}">
        </div>

        <div class="form-row">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ $klant->Email }}">
        </div>

        <div class="checkbox-row">
            <label for="volwassen">Volwassen:</label>
            <input type="checkbox" id="volwassen" name="is_volwassen" {{ $klant->IsVolwassen ? 'checked' : '' }}>
        </div>

        <button type="submit">Wijzigen</button>
    </form>
</body>
</html>