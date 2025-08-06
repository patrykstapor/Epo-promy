<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Epo-Prromy – Bilety na prom online')</title>
    <meta name="description" content="@yield('meta_description', 'Kup bilety na prom – porównuj trasy i ceny, rezerwuj online w kilka minut.')">

    {{-- Tailwind CDN (na produkcję: użyj Vite + Tailwind) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900">
<header class="border-b bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-lg">
                {{-- Proste „logo” --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d=""/>
                </svg>
                Epo-Promy
            </a>
            <nav class="hidden md:flex items-center gap-6">
                <a href="{{ route('home') }}" class="hover:text-blue-600">Strona główna</a>
                <a href="#popularne" class="hover:text-blue-600">Popularne trasy</a>
                <a href="#dlaczego" class="hover:text-blue-600">Dlaczego my</a>
                <a href="#kontakt" class="hover:text-blue-600">Kontakt</a>
            </nav>
            <div class="flex items-center gap-3">
                <a href="#" class="text-sm hover:text-blue-600">Zaloguj</a>
                <a href="#" class="inline-flex items-center text-sm font-medium px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Moje rezerwacje</a>
            </div>
        </div>
    </div>
</header>

<main class="flex-1">
    @yield('content')
</main>

<footer id="kontakt" class="border-t bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 grid md:grid-cols-3 gap-8">
        <div>
            <div class="font-semibold text-lg mb-2">Epo-Promy</div>
            <p class="text-sm text-gray-600">Twoje centrum rezerwacji biletów na prom po Bałtyku i nie tylko.</p>
        </div>
        <div>
            <div class="font-semibold mb-2">Pomoc</div>
            <ul class="space-y-1 text-sm text-gray-700">
                <li><a href="#" class="hover:text-blue-600">FAQ</a></li>
                <li><a href="#" class="hover:text-blue-600">Warunki i zwroty</a></li>
                <li><a href="#" class="hover:text-blue-600">Kontakt</a></li>
            </ul>
        </div>
        <div>
            <div class="font-semibold mb-2">Newsletter</div>
            <form class="flex gap-2">
                <input type="email" placeholder="Twój e‑mail" class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Zapisz</button>
            </form>
        </div>
    </div>
    <div class="text-center text-xs text-gray-500 pb-6">© {{ date('Y') }} Epo-Promy. Wszelkie prawa zastrzeżone.</div>
</footer>
</body>
</html>
