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

    {{-- Table --}}
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
                    <td>{{ $uitslag->Datum   }}</td>
                    <td>{{ $uitslag->AantalUren   }}</td>
                    <td>{{ $uitslag->BeginTijd   }}</td>
                    <td>{{ $uitslag->EindTijd   }}</td>
                    <td>{{ $uitslag->AantalVolwassen   }}</td>
                    <td>{{ $uitslag->AantalKinderen   }}</td>
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
@endsection