@extends('layouts.app')

@section('title', 'Bevestigde reserveringen')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h2 class="fs-4 mb-2 mb-sm-0">Bevestigde reserveringen tot {{ \Carbon\Carbon::parse($datum)->format('d-m-Y') }}</h2>
                <a href="{{ route('reservering.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Terug
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Datum</th>
                                <th class="d-none d-md-table-cell">Tijd</th>
                                <th>Naam klant</th>
                                <th class="d-none d-sm-table-cell">Baannr</th>
                                <th class="d-none d-md-table-cell">Uren</th>
                                <th class="d-none d-lg-table-cell">Personen</th>
                                <th class="d-none d-xl-table-cell">Pakketoptie</th>
                                <th class="d-none d-xl-table-cell">Reserveringsnr</th>
                                <th class="d-sm-none">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reserveringen as $reservering)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}</td>
                                    <td class="d-none d-md-table-cell">{{ \Carbon\Carbon::parse($reservering->begin_tijd)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($reservering->eind_tijd)->format('H:i') }}</td>
                                    <td>{{ $reservering->fullName }}</td>
                                    <td class="d-none d-sm-table-cell">{{ $reservering->baan_nummer }}</td>
                                    <td class="d-none d-md-table-cell">{{ $reservering->aantal_uren }}</td>
                                    <td class="d-none d-lg-table-cell">
                                        {{ $reservering->aantal_volwassen }} volwassenen
                                        @if($reservering->aantal_kinderen)
                                            <br>{{ $reservering->aantal_kinderen }} kinderen
                                        @endif
                                    </td>
                                    <td class="d-none d-xl-table-cell">{{ $reservering->pakketoptie_naam ?? 'Geen' }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $reservering->reserveringsnummer }}</td>
                                    <td class="d-sm-none">
                                        <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#details-{{ $reservering->id }}" aria-expanded="false">
                                            <i class="bi bi-info-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Mobile row with expandable details -->
                                <tr class="d-sm-none">
                                    <td colspan="3" class="p-0 border-top-0">
                                        <div class="collapse" id="details-{{ $reservering->id }}">
                                            <div class="card card-body bg-light">
                                                <div class="small">
                                                    <p class="mb-1"><strong>Tijd:</strong> {{ \Carbon\Carbon::parse($reservering->begin_tijd)->format('H:i') }} -
                                                        {{ \Carbon\Carbon::parse($reservering->eind_tijd)->format('H:i') }}</p>
                                                    <p class="mb-1"><strong>Baan:</strong> {{ $reservering->baan_nummer }}</p>
                                                    <p class="mb-1"><strong>Uren:</strong> {{ $reservering->aantal_uren }}</p>
                                                    <p class="mb-1"><strong>Personen:</strong> {{ $reservering->aantal_volwassen }} volwassenen
                                                        @if($reservering->aantal_kinderen), {{ $reservering->aantal_kinderen }} kinderen @endif
                                                    </p>
                                                    <p class="mb-1"><strong>Pakket:</strong> {{ $reservering->pakketoptie_naam ?? 'Geen' }}</p>
                                                    <p class="mb-0"><strong>Reserveringsnr:</strong> {{ $reservering->reserveringsnummer }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<style>
    @media (max-width: 575.98px) {
        .card-header h2 {
            font-size: 1.25rem;
        }

        .table td, .table th {
            padding: 0.5rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    // Close other detail panels when one is opened
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');

        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-bs-target');

                // Close all other open panels
                document.querySelectorAll('.collapse.show').forEach(panel => {
                    if ('#' + panel.id !== target) {
                        panel.classList.remove('show');
                    }
                });
            });
        });
    });
</script>
@endsection
