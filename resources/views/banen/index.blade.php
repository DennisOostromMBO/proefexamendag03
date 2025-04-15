<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Reserveringen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Overzicht Reserveringen</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <p>{{ $errors->first('message') }}</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white shadow-md rounded border-collapse text-xs sm:text-sm">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border px-2 py-1 text-left">Naam</th>
                            <th class="border px-2 py-1 text-left">Datum</th>
                            <th class="border px-2 py-1 text-left">Volwassenen</th>
                            <th class="border px-2 py-1 text-left">Kinderen</th>
                            <th class="border px-2 py-1 text-left">Baan</th>
                            <th class="border px-2 py-1 text-left">Wijzig</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banen as $baan)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-2 py-1">{{ $baan->naam }}</td>
                                <td class="border px-2 py-1">{{ $baan->datum }}</td>
                                <td class="border px-2 py-1">{{ $baan->aantal_volwassen }}</td>
                                <td class="border px-2 py-1">{{ $baan->aantal_kinderen ?? 'geen' }}</td>
                                <td class="border px-2 py-1">{{ $baan->baan }}</td>
                                <td class="border px-2 py-1">
                                    <a href="{{ route('reserveringen.edit', ['id' => $baan->reservering_id]) }}" class="text-blue-500 hover:underline">
                                        Wijzig
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>