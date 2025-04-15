<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Baannummer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded p-6">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Details Baannummer</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <p>{{ $errors->first('message') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ route('reserveringen.update', $reservering->id) }}">
            @csrf
            <div class="mb-4">
                <label for="baan_id" class="block text-gray-700 font-medium mb-2">Baannummer:</label>
                <select name="baan_id" id="baan_id" class="w-full border border-gray-300 rounded px-3 py-2">
                    @foreach ($banen as $baan)
                        <option value="{{ $baan->id }}" {{ $baan->id == $reservering->baan_id ? 'selected' : '' }}>
                            {{ $baan->nummer }}{{ in_array($baan->nummer, [7, 8]) ? ' (baan met hekjes)' : '' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Wijzigen
            </button>
        </form>
    </div>
</body>
</html>