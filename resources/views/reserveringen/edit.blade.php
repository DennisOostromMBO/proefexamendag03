<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Baannummer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Details Baannummer</h1>

    @if ($errors->any())
        <div class="error">
            <p>{{ $errors->first('message') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('reserveringen.update', $reservering->id) }}">
        @csrf
        <label for="baan_id">Baannummer:</label>
        <select name="baan_id" id="baan_id">
            @foreach ($banen as $baan)
                <option value="{{ $baan->id }}" {{ $baan->id == $reservering->baan_id ? 'selected' : '' }}>
                    {{ $baan->nummer }}
                </option>
            @endforeach
        </select>
        <button type="submit">Wijzigen</button>
    </form>
</body>
</html>
