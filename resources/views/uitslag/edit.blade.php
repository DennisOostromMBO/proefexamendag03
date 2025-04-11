{{-- filepath: resources/views/uitslag/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Uitslag')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Uitslag</h1>


    {{-- Edit Form --}}
    <form method="POST" action="{{ route('uitslag.update', ['id' => $uitslag->UitslagId]) }}">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="Naam" class="form-label">Naam:</label>
            <input type="text" class="form-control" id="Naam" name="Naam" value="{{ $uitslag->Naam }}" disabled>
        </div>

        <div class="mb-3">
            <label for="Aantalpunten" class="form-label">Aantal punten:</label>
            <input type="number" class="form-control" id="Aantalpunten" name="Aantalpunten" value="{{ old('Aantalpunten', $uitslag->Aantalpunten) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Wijzigen</button>
    </form>
</div>
@endsection