@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Welkom bij Bowlingcentrum</h2>
            </div>
            <div class="card-body">
                <p class="lead">Wat wilt u doen?</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('reservering.index') }}" class="btn btn-primary btn-lg mb-2">Overzicht bevestigde reserveringen bekijken</a>
                    <a href="{{ route('reserveringen.index') }}" class="btn btn-info btn-lg mb-2">Alle reserveringen beheren</a>
                    <a href="{{ route('banen.index') }}" class="btn btn-success btn-lg mb-2">Banen overzicht</a>
                    <a href="{{ route('uitslag.index') }}" class="btn btn-warning btn-lg mb-2">Uitslagen bekijken</a>
                    <a href="{{ route('klanten.index') }}" class="btn btn-secondary btn-lg mb-2">Klanten beheren</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
