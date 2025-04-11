<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Klant Details</h2>

        <form method="POST" action="{{ route('klanten.update', $klant->id) }}" class="bg-white p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="voornaam" class="form-label">Voornaam:</label>
                <input type="text" id="voornaam" name="Voornaam" class="form-control" value="{{ old('Voornaam', $klant->Voornaam) }}" required>
                @error('Voornaam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tussenvoegsel" class="form-label">Tussenvoegsel:</label>
                <input type="text" id="tussenvoegsel" name="Tussenvoegsel" class="form-control" value="{{ old('Tussenvoegsel', $klant->Tussenvoegsel) }}">
                @error('Tussenvoegsel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="achternaam" class="form-label">Achternaam:</label>
                <input type="text" id="achternaam" name="Achternaam" class="form-control" value="{{ old('Achternaam', $klant->Achternaam) }}" required>
                @error('Achternaam')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mobiel" class="form-label">Mobiel:</label>
                <input type="tel" id="mobiel" name="Mobiel" class="form-control" value="{{ old('Mobiel', $klant->Mobiel) }}">
                @error('Mobiel')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" id="email" name="Email" class="form-control" value="{{ old('Email', $klant->Email) }}">
                @error('Email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" id="volwassen" name="is_volwassen" class="form-check-input" value="1" {{ old('is_volwassen', $klant->is_volwassen) ? 'checked' : '' }}>
                <label for="volwassen" class="form-check-label">Volwassen</label>
            </div>

            <button type="submit" class="btn btn-primary">Wijzigen</button>
        </form>
    </div>
</body>
</html>