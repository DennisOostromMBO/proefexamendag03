{{-- filepath: c:\Users\danie\OneDrive\Documenten\school mappen\Leerjaar 2\Oefenexamen\proefexamendag03\resources\views\reservering\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Overzicht Reserveringen')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Overzicht bevestigde reserveringen</h1>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('reservering.index') }}" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="from_date" class="col-form-label">Toon reserveringen tot en met datum:</label>
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
            @foreach ($reserveringen as $reservering)
                <tr>
                    <td>{{ $reservering->Naam }}</td>
                    <td>{{ $reservering->Datum }}</td>
                    <td>{{ $reservering->AantalUren }}</td>
                    <td>{{ $reservering->BeginTijd }}</td>
                    <td>{{ $reservering->EindTijd }}</td>
                    <td>{{ $reservering->AantalVolwassen }}</td>
                    <td>{{ $reservering->AantalKinderen }}</td>
                    <td>
                        <a href="{{ route('reservering.uitslagen', ['id' => $reservering->ReserveringId]) }}" class="btn btn-primary btn-sm">
                            Bekijk Score
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection