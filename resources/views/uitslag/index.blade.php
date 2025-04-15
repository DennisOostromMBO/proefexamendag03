@extends('layouts.app')

@section('title', 'Overzicht Uitslagen')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Overzicht bevestigde uitslagen</h1>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('uitslag.index') }}" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="from_date" class="col-form-label">Toon uitslagen tot en met datum:</label>
            </div>
            <div class="col-auto">
                <input type="date" id="from_date" name="from_date" class="form-control" value="{{ request('from_date') }}">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Filteren</button>
            </div>
        </div>
    </form>

    {{-- Desktop Table --}}
    <div class="d-none d-md-block">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Naam</th>
                    <th>Datum</th>
                    <th>Aantal uren</th>
                    <th>Begintijd</th>
                    <th>Eindtijd</th>
                    <th>Volwassenen</th>
                    <th>Kinderen</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uitslagen as $uitslag)
                    <tr>
                        <td>{{ $uitslag->Naam }}</td>
                        <td>{{ $uitslag->Datum }}</td>
                        <td>{{ $uitslag->AantalUren }}</td>
                        <td>{{ $uitslag->BeginTijd }}</td>
                        <td>{{ $uitslag->EindTijd }}</td>
                        <td>{{ $uitslag->AantalVolwassen }}</td>
                        <td>{{ $uitslag->AantalKinderen }}</td>
                        <td>
                            <a href="{{ route('reservering.uitslagen', ['id' => $uitslag->UitslagId]) }}" class="btn btn-primary btn-sm">
                                Bekijk Score
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Mobile Table --}}
    <div class="d-md-none">
        @foreach ($uitslagen as $uitslag)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $uitslag->Naam }}</h5>
                    <p class="card-text">
                        <strong>Datum:</strong> {{ $uitslag->Datum }}<br>
                        <strong>Aantal uren:</strong> {{ $uitslag->AantalUren }}<br>
                        <strong>Begintijd:</strong> {{ $uitslag->BeginTijd }}<br>
                        <strong>Eindtijd:</strong> {{ $uitslag->EindTijd }}<br>
                        <strong>Volwassenen:</strong> {{ $uitslag->AantalVolwassen }}<br>
                        <strong>Kinderen:</strong> {{ $uitslag->AantalKinderen }}
                    </p>
                    <a href="{{ route('reservering.uitslagen', ['id' => $uitslag->UitslagId]) }}" class="btn btn-primary btn-sm">
                        Bekijk Score
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection