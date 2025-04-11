<?php
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uitslagen Overzicht</h1>
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
</div>
@endsection