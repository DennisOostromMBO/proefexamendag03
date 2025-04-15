<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bowlingcentrum') - Proefexamendag03</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Bowlingcentrum</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('reservering*') ? 'active' : '' }}" href="{{ route('reservering.index') }}">Overzicht bevestigde reserveringen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('reserveringen*') ? 'active' : '' }}" href="{{ route('reserveringen.index') }}">Alle reserveringen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('banen*') ? 'active' : '' }}" href="{{ route('banen.index') }}">Banen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('uitslag*') ? 'active' : '' }}" href="{{ route('uitslag.index') }}">Uitslagen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('klanten*') ? 'active' : '' }}" href="{{ route('klanten.index') }}">Klanten</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        {{-- Main Content --}}
        <div class="flex-grow">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
