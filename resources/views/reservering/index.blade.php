{{-- filepath: c:\Users\danie\OneDrive\Documenten\school mappen\Leerjaar 2\Oefenexamen\proefexamendag03\resources\views\reservering\index.blade.php --}}
@extends('layouts.app')

@section('title', 'Uitslagen Overzicht')

@section('content')
<div class="container">
    <h1>Uitslagen Overzicht</h1>

    {{-- Display error message if present --}}
    @if ($errorMessage)
        <div class="alert alert-warning">
            {{ $errorMessage }}
        </div>
    @endif

    {{-- Display the table if uitslagen are available --}}
    @if ($uitslagen->isNotEmpty())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Spel ID</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Aantal punten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($uitslagen as $uitslag)
                    <tr>
                        <td>{{ $uitslag->UitslagId }}</td>
                        <td>{{ $uitslag->SpelId }}</td>
                        <td>{{ $uitslag->Voornaam }}</td>
                        <td>{{ $uitslag->Achternaam }}</td>
                        <td>{{ $uitslag->Aantalpunten }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection