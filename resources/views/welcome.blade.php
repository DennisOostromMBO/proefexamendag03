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
                    <a href="{{ route('reserveringen.index') }}" class="btn btn-primary btn-lg">Overzicht reserveringen bekijken</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
