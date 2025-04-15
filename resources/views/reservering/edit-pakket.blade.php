@extends('layouts.app')

@section('title', 'Details Optiepakket')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card">
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                <h2 class="fs-4 mb-0">Details Optiepakket</h2>
                <a href="{{ route('reservering.index') }}" class="btn btn-sm btn-secondary mt-2 mt-sm-0">
                    <i class="bi bi-arrow-left"></i> Terug
                </a>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="alert alert-light">
                        <h5 class="mb-3">Reservering voor {{ $reservering->fullName }}</h5>
                        <div class="row g-2">
                            <div class="col-12 col-sm-6">
                                <strong><i class="bi bi-calendar3"></i> Datum:</strong>
                                {{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}
                            </div>
                            <div class="col-12 col-sm-6">
                                <strong><i class="bi bi-people-fill"></i> Aantal personen:</strong>
                                {{ $reservering->aantal_volwassen }} volwassenen,
                                {{ $reservering->aantal_kinderen ?: '0' }} kinderen
                            </div>
                        </div>
                    </div>
                </div>

                <form action="{{ route('reservering.update.pakket', $reservering->id) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="pakketoptie_id" class="form-label fw-bold">
                            <i class="bi bi-box-seam"></i> Optiepakket:
                        </label>
                        <select name="pakketoptie_id" id="pakketoptie_id" class="form-select">
                            <option value="">Geen optiepakket</option>
                            @foreach($pakketOpties as $optie)
                                <option value="{{ $optie->id }}" {{ $reservering->pakketoptie_id == $optie->id ? 'selected' : '' }}>
                                    {{ $optie->naam }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid d-sm-flex gap-2 justify-content-sm-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Wijzigen
                        </button>
                    </div>
                </form>
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
