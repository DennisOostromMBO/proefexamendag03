{{-- filepath: resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Mijn Website')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-black flex flex-col min-h-screen">
        {{-- Navbar --}}
        <x-navbar />

        {{-- Main Content --}}
        <div class="flex-grow">
            @yield('content')
        </div>

        {{-- Footer --}}
        <footer class="bg-gray-800 text-white text-center p-4">
            &copy; {{ date('Y') }} Mijn Website. Alle rechten voorbehouden.
        </footer>
    </body>
</html>