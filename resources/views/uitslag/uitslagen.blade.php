@extends('layouts.app')

@section('title', 'Uitslagen Overzicht')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Uitslagen Overzicht</h1>

    {{-- Table --}}
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Spel ID</th>
                <th>Naam</th>
                <th>Aantal punten</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($uitslagen as $uitslag)
                <tr>
                    <td>{{ $uitslag->UitslagId }}</td>
                    <td>{{ $uitslag->SpelId }}</td>
                    <td>{{ $uitslag->Naam }}</td>
                    <td>{{ $uitslag->Aantalpunten }}</td>
                    <td>
                        <a href="{{ route('uitslag.edit', ['id' => $uitslag->UitslagId]) }}" class="btn btn-warning btn-sm">
                            Wijzigen
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Van de geselecteerde reservering zijn geen uitslagen bekend.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection