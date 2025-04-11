{{-- filepath: resources/views/components/navbar.blade.php --}}
<nav class="bg-gray-800 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-lg font-semibold">Mijn Website</a>
        <ul class="flex space-x-4">
            <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
            <li><a href="{{ url('/reservering') }}" class="hover:underline">Reserveringen</a></li>
            <li><a href="{{ url('/overzicht') }}" class="hover:underline">Overzicht</a></li>
        </ul>
    </div>
</nav>