{{-- filepath: resources/views/uitslag/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Wijzig Uitslag')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Wijzig Uitslag</h1>



    {{-- Edit Form --}}
    <form method="POST" action="{{ route('uitslag.update', ['id' => $uitslag->UitslagId]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Aantalpunten" class="form-label">Aantal punten</label>
            <input type="number" class="form-control" id="Aantalpunten" name="Aantalpunten" value="{{ old('Aantalpunten', $uitslag->Aantalpunten) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Wijzigen</button>
    </form>
</div>
@endsection