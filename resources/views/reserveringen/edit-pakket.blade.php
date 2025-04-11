@extends('layouts.app')

@section('title', 'Details Optiepakket')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Details Optiepakket</h2>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5>Reservering voor {{ $reservering->fullName }}</h5>
                    <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($reservering->datum)->format('d-m-Y') }}</p>
                    <p>
                        <strong>Aantal personen:</strong>
                        {{ $reservering->aantal_volwassen }} volwassenen,
                        {{ $reservering->aantal_kinderen ?: '0' }} kinderen
                    </p>
                </div>

                <form action="{{ route('reserveringen.update.pakket', $reservering->id) }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="pakketoptie_id" class="form-label">Optiepakket:</label>
                        <select name="pakketoptie_id" id="pakketoptie_id" class="form-control">
                            <option value="">Geen optiepakket</option>
                            @foreach($pakketOpties as $optie)
                                <option value="{{ $optie->id }}" {{ $reservering->pakketoptie_id == $optie->id ? 'selected' : '' }}>
                                    {{ $optie->naam }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Wijzigen</button>
                        <a href="{{ route('reserveringen.index') }}" class="btn btn-secondary">Terug</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
