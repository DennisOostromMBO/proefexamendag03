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
        .error {
            color: red;
            font-size: 14px;
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
            <input type="text" id="voornaam" name="Voornaam" value="{{ old('Voornaam', $klant->Voornaam) }}" required>
            @error('Voornaam')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="tussenvoegsel">Tussenvoegsel:</label>
            <input type="text" id="tussenvoegsel" name="Tussenvoegsel" value="{{ old('Tussenvoegsel', $klant->Tussenvoegsel) }}">
            @error('Tussenvoegsel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="Achternaam" value="{{ old('Achternaam', $klant->Achternaam) }}" required>
            @error('Achternaam')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="mobiel">Mobiel:</label>
            <input type="tel" id="mobiel" name="Mobiel" value="{{ old('Mobiel', $klant->Mobiel) }}">
            @error('Mobiel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="Email" value="{{ old('Email', $klant->Email) }}">
            @error('Email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="checkbox-row">
            <label for="volwassen">Volwassen:</label>
            <input type="checkbox" id="volwassen" name="IsVolwassen" value="1" {{ old('IsVolwassen', $klant->IsVolwassen) ? 'checked' : '' }}>
        </div>

        <button type="submit">Wijzigen</button>
    </form>
</body>
</html>