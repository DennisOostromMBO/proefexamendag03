@extends('layouts.app')

@section('title', 'Overzicht bevestigde reserveringen')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Overzicht bevestigde reserveringen</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('reserveringen.index') }}" method="get" class="mb-4">
                    <div class="row align-items-end">
                        <div class="col-md-4">
                            <label for="datum" class="form-label">Toon reserveringen tot en met datum:</label>
                            <input type="date" class="form-control" id="datum" name="datum" value="{{ $datum }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filteren</button>
                        </div>
                    </div>
                </form>

                @if($hasResults)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Naam</th>
                                    <th>Datum</th>
                                    <th>Volwassenen</th>
                                    <th>Kinderen</th>
                                    <th>Optiepakket</th>
                                    <th>Wijzigen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reserveringen as $reservering)
                                    <tr>
                                        <td>{{ $reservering->fullName }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}</td>
                                        <td>{{ $reservering->aantal_volwassen }}</td>
                                        <td>{{ $reservering->aantal_kinderen ?: '0' }}</td>
                                        <td>{{ $reservering->pakketoptie_naam ?? 'Geen' }}</td>
                                        <td>
                                            <a href="{{ route('reserveringen.edit.pakket', $reservering->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        Er is geen reserveringsinformatie beschikbaar voor deze geselecteerde datum.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection
