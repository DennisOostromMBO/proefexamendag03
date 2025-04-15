@extends('layouts.app')

@section('title', 'Overzicht bevestigde reserveringen')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2 class="fs-4 mb-0">Overzicht bevestigde reserveringen</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('reservering.index') }}" method="get" class="mb-4">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-6 col-lg-4">
                            <label for="datum" class="form-label">Toon reserveringen tot en met datum:</label>
                            <input type="date" class="form-control" id="datum" name="datum" value="{{ $datum }}">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary w-100 w-md-auto">Filteren</button>
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
                                    <th class="d-none d-md-table-cell">Volwassenen</th>
                                    <th class="d-none d-md-table-cell">Kinderen</th>
                                    <th class="d-none d-md-table-cell">Optiepakket</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reserveringen as $reservering)
                                    <tr>
                                        <td>{{ $reservering->fullName }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}</td>
                                        <td class="d-none d-md-table-cell">{{ $reservering->aantal_volwassen }}</td>
                                        <td class="d-none d-md-table-cell">{{ $reservering->aantal_kinderen ?: '0' }}</td>
                                        <td class="d-none d-md-table-cell">{{ $reservering->pakketoptie_naam ?? 'Geen' }}</td>
                                        <td>
                                            <a href="{{ route('reservering.edit.pakket', $reservering->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i> <span class="d-inline d-md-none">Wijzig</span>
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Mobile row with extra details -->
                                    <tr class="d-md-none">
                                        <td colspan="3" class="border-top-0 pt-0">
                                            <div class="small text-muted">
                                                <div><strong>Volwassenen:</strong> {{ $reservering->aantal_volwassen }}</div>
                                                <div><strong>Kinderen:</strong> {{ $reservering->aantal_kinderen ?: '0' }}</div>
                                                <div><strong>Pakket:</strong> {{ $reservering->pakketoptie_naam ?? 'Geen' }}</div>
                                            </div>
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
<style>
    @media (max-width: 575.98px) {
        .card-header h2 {
            font-size: 1.5rem;
        }
    }
</style>
@endsection