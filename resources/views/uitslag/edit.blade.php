{{-- filepath: resources/views/uitslag/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Uitslag Wijzigen')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uitslag Wijzigen</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('uitslag.update', ['id' => $uitslag->UitslagId]) }}">
        @csrf
        <div class="mb-3">
            <label for="Naam" class="form-label">Naam</label>
            <input type="text" class="form-control" id="Naam" value="{{ $uitslag->Naam }}" disabled>
        </div>
        <div class="mb-3">
            <label for="Aantalpunten" class="form-label">Aantal punten</label>
            <input type="number" class="form-control" id="Aantalpunten" name="Aantalpunten" value="{{ $uitslag->Aantalpunten }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Wijzigen</button>
        <a href="{{ route('reservering.uitslagen', ['id' => $uitslag->SpelId]) }}" class="btn btn-secondary">Annuleren</a>
    </form>
</div>
@endsection