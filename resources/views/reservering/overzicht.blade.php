@extends('layouts.app')

@section('title', 'Bevestigde reserveringen')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>Bevestigde reserveringen tot {{ \Carbon\Carbon::parse($datum)->format('d-m-Y') }}</h2>
                <a href="{{ route('reservering.index') }}" class="btn btn-secondary">Terug</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Datum</th>
                                <th>Tijd</th>
                                <th>Naam klant</th>
                                <th>Baannummer</th>
                                <th>Aantal uren</th>
                                <th>Aantal personen</th>
                                <th>Pakketoptie</th>
                                <th>Reserveringsnummer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reserveringen as $reservering)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($reservering->begin_tijd)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($reservering->eind_tijd)->format('H:i') }}</td>
                                    <td>{{ $reservering->fullName }}</td>
                                    <td>{{ $reservering->baan_nummer }}</td>
                                    <td>{{ $reservering->aantal_uren }}</td>
                                    <td>
                                        {{ $reservering->aantal_volwassen }} volwassenen
                                        @if($reservering->aantal_kinderen)
                                            <br>{{ $reservering->aantal_kinderen }} kinderen
                                        @endif
                                    </td>
                                    <td>{{ $reservering->pakketoptie_naam ?? 'Geen' }}</td>
                                    <td>{{ $reservering->reserveringsnummer }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection