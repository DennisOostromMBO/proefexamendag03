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
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800 text-center md:text-left">Overzicht reserveringen</h1>
            <form method="GET" action="{{ route('reserveringen.index') }}" class="flex flex-col md:flex-row items-center gap-4">
                <label for="from_date" class="text-gray-700 font-medium">Datum:</label>
                <input type="date" id="from_date" name="from_date" value="{{ $fromDate ?? '' }}" class="border border-gray-300 rounded px-3 py-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Toon Reserveringen</button>
            </form>
        </div>

        @if ($errorMessage)
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <p>{{ $errorMessage }}</p>
            </div>
        @else
            @if (!empty($reserveringen) && $reserveringen->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto bg-white shadow-md rounded border-collapse text-xs sm:text-sm hidden sm:table">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border px-2 py-1 text-left">Naam</th>
                                <th class="border px-2 py-1 text-left">Datum</th>
                                <th class="border px-2 py-1 text-left">Aantal Uren</th>
                                <th class="border px-2 py-1 text-left">Begin Tijd</th>
                                <th class="border px-2 py-1 text-left">Eind Tijd</th>
                                <th class="border px-2 py-1 text-left">Aantal Volwassenen</th>
                                <th class="border px-2 py-1 text-left">Aantal Kinderen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reserveringen as $reservering)
                                <tr class="hover:bg-gray-100">
                                    <td class="border px-2 py-1">{{ $reservering->naam }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->datum }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->aantal_uren }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->begin_tijd }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->eind_tijd }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->aantal_volwassen }}</td>
                                    <td class="border px-2 py-1">{{ $reservering->aantal_kinderen !== null ? $reservering->aantal_kinderen : 'geen' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="sm:hidden">
                    @foreach ($reserveringen as $reservering)
                        <div class="bg-white shadow-md rounded mb-4 p-4">
                            <p><span class="font-bold">Naam:</span> {{ $reservering->naam }}</p>
                            <p><span class="font-bold">Datum:</span> {{ $reservering->datum }}</p>
                            <p><span class="font-bold">Aantal Uren:</span> {{ $reservering->aantal_uren }}</p>
                            <p><span class="font-bold">Begin Tijd:</span> {{ $reservering->begin_tijd }}</p>
                            <p><span class="font-bold">Eind Tijd:</span> {{ $reservering->eind_tijd }}</p>
                            <p><span class="font-bold">Aantal Volwassenen:</span> {{ $reservering->aantal_volwassen }}</p>
                            <p><span class="font-bold">Aantal Kinderen:</span> {{ $reservering->aantal_kinderen !== null ? $reservering->aantal_kinderen : 'geen' }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif
    </div>
</body>
</html>