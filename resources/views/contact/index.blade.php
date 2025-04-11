<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Klanten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // Redirect to the index page after 4 seconds if a success message is present
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    window.location.href = "{{ route('klanten.index') }}";
                }, 4000);
            }
        });
    </script>
</head>
<body>
    <h1>Overzicht Klanten</h1>

    @if (session('success'))
        <div id="success-message" style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('klanten.index') }}">
        <label for="datum">Datum:</label>
        <input type="date" name="datum" id="datum" value="{{ request('datum') }}" />

        <button type="submit">Tonen</button>
    </form>

    @if ($noData)
        <p class="text-danger">Er is geen informatie beschikbaar voor deze geselecteerde datum.</p>
    @else
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Naam</th>
                    
                    <th>Mobiel</th>
                    <th>E-mail</th>
                    <th>Volwassen</th>
                    <th>Wijzig</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($klanten as $klant)
                    <tr>
                        <td>{{ $klant->Voornaam }} {{ $klant->Tussenvoegsel ?? '' }} {{ $klant->Achternaam }}</td>
                        
                        <td>{{ $klant->Mobiel }}</td>
                        <td>{{ $klant->Email }}</td>
                        <td>{{ $klant->is_volwassen ? 'Ja' : 'Nee' }}</td>
                        <td>
                            <a href="{{ route('klanten.edit', $klant->id) }}" class="btn btn-sm btn-primary" title="Wijzigen">
                                ✏️ Bewerken
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
