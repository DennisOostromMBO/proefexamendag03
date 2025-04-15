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
<body class="container">
    <h1 class="text-center my-4">Overzicht Klanten</h1>

    @if (session('success'))
        <div id="success-message" class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="GET" action="{{ route('klanten.index') }}" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-12 col-md-auto">
                <label for="datum" class="col-form-label">Datum:</label>
            </div>
            <div class="col-12 col-md-auto">
                <input type="date" name="datum" id="datum" class="form-control" value="{{ request('datum') }}" />
            </div>
            <div class="col-12 col-md-auto">
                <button type="submit" class="btn btn-primary w-100">Tonen</button>
            </div>
        </div>
    </form>

    @if ($noData)
        <p class="text-danger text-center">Er is geen informatie beschikbaar voor deze geselecteerde datum.</p>
    @else
        <div class="d-none d-md-block table-responsive">
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
                                <a href="{{ route('klanten.edit', $klant->id) }}" class="btn btn-sm btn-primary w-100" title="Wijzigen">
                                    ✏️ Bewerken
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-block d-md-none">
            @foreach ($klanten as $klant)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $klant->Voornaam }} {{ $klant->Tussenvoegsel ?? '' }} {{ $klant->Achternaam }}</h5>
                        <p class="card-text">
                            <strong>Mobiel:</strong> {{ $klant->Mobiel }}<br>
                            <strong>E-mail:</strong> {{ $klant->Email }}<br>
                            <strong>Volwassen:</strong> {{ $klant->is_volwassen ? 'Ja' : 'Nee' }}
                        </p>
                        <a href="{{ route('klanten.edit', $klant->id) }}" class="btn btn-primary w-100" title="Wijzigen">
                            ✏️ Bewerken
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>
