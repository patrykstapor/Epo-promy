@extends('layout.app')

@section('title', 'Kup bilety na prom – szybka rezerwacja online | FerryShop')

@section('content')
    {{-- HERO + wyszukiwarka --}}
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-blue-50 to-blue-100"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 grid lg:grid-cols-2 gap-10 items-center">
            <div>
                <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">
                    Rezerwuj bilety na prom <span class="text-blue-700">szybciej</span> i <span class="text-blue-700">taniej</span>
                </h1>
                <p class="mt-4 text-gray-700 text-lg">Mamy najlepsze opcje dla Ciebie.</p>
                <ul class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-700">
                    <li class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-blue-600"></span> Bezpieczna płatność
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-blue-600"></span> Potwierdzenie w minutę
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-blue-600"></span> Całodobowe wsparcie
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="inline-block h-2 w-2 rounded-full bg-blue-600"></span> Elastyczne bilety
                    </li>
                </ul>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-6">
                <h2 class="text-lg font-semibold mb-4">Wyszukaj rejs</h2>

                @if ($errors->any())
                    <div class="mb-4 rounded-md border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                        <strong>Popraw błędy:</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sailings.search') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @csrf
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1" for="from">Skąd</label>
                        <input id="from" name="from" type="text" value="{{ old('from') }}" placeholder="np. Gdańsk"
                               class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1" for="to">Dokąd</label>
                        <input id="to" name="to" type="text" value="{{ old('to') }}" placeholder="np. Karlskrona"
                               class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="date">Data</label>
                        <input id="date" name="date" type="date" value="{{ old('date') }}"
                               class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="passengers">Pasażerowie</label>
                        <input id="passengers" name="passengers" type="number" min="1" max="9" value="{{ old('passengers', 1) }}"
                               class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium mb-1" for="vehicle">Pojazd</label>
                        <select id="vehicle" name="vehicle"
                                class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="none" @selected(old('vehicle') === 'none')>Bez pojazdu</option>
                            <option value="car" @selected(old('vehicle') === 'car')>Samochód osobowy</option>
                            <option value="bike" @selected(old('vehicle') === 'bike')>Rower</option>
                            <option value="van" @selected(old('vehicle') === 'van')>Bus/van</option>
                        </select>
                    </div>
                    <div class="sm:col-span-2">
                        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-3 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700">
                            Wyszukaj rejsy
                        </button>
                    </div>
                    <p class="sm:col-span-2 text-xs text-gray-500">Rezerwując akceptujesz regulamin oraz politykę prywatności.</p>
                </form>
            </div>
        </div>
    </section>

    {{-- Popularne trasy --}}
    <section id="popularne" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Popularne trasy</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($featuredRoutes as $r)
                    <article class="bg-white border rounded-xl p-5 hover:shadow-lg transition">
                        <div class="flex items-center justify-between">
                            <h3 class="font-semibold">{{ $r['from'] }} → {{ $r['to'] }}</h3>
                            <span class="text-sm text-gray-500">{{ $r['duration'] }}</span>
                        </div>
                        <p class="mt-2 text-sm text-gray-600">od <span class="font-semibold text-gray-900">{{ number_format($r['price'], 0, ',', ' ') }} zł</span></p>
                        <a href="{{ route('sailings.search', ['from' => $r['from'], 'to' => $r['to'], 'date' => now()->addDay()->toDateString(), 'passengers' => 1]) }}"
                           class="mt-4 inline-flex items-center text-sm font-medium text-blue-700 hover:text-blue-800">
                            Sprawdź terminy →
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Dlaczego my --}}
    <section id="dlaczego" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Dlaczego warto z nami?</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 border rounded-xl">
                    <h3 class="font-semibold">Najlepsze ceny</h3>
                    <p class="mt-2 text-gray-600 text-sm">Negocjujemy stawki z przewoźnikami, abyś płacił mniej.</p>
                </div>
                <div class="p-6 border rounded-xl">
                    <h3 class="font-semibold">Prosta rezerwacja</h3>
                    <p class="mt-2 text-gray-600 text-sm">Intuicyjny proces – kup bilet w 3 krokach.</p>
                </div>
                <div class="p-6 border rounded-xl">
                    <h3 class="font-semibold">Wsparcie 24/7</h3>
                    <p class="mt-2 text-gray-600 text-sm">Nasz zespół jest dostępny zawsze, gdy tego potrzebujesz.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Opinie klientów --}}
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-6">Co mówią nasi klienci</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <figure class="p-6 border rounded-xl bg-white">
                    <blockquote class="text-gray-700 text-sm">{{\App\Models\User::factory()->create()}}</blockquote>
                    <figcaption class="mt-3 text-xs text-gray-500">— </figcaption>
                </figure>
                <figure class="p-6 border rounded-xl bg-white">
                    <blockquote class="text-gray-700 text-sm">”</blockquote>
                    <figcaption class="mt-3 text-xs text-gray-500">— </figcaption>
                </figure>
                <figure class="p-6 border rounded-xl bg-white">
                    <blockquote class="text-gray-700 text-sm"></blockquote>
                    <figcaption class="mt-3 text-xs text-gray-500"></figcaption>
                </figure>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-gradient-to-br from-blue-600 to-blue-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl font-bold">Gotowy na rejs?</h2>
                <p class="mt-2 text-blue-100">Zarezerwuj swój bilet już teraz – zajmie to mniej niż 2 minuty.</p>
            </div>
            <a href="#"
               class="inline-flex items-center px-6 py-3 bg-white text-blue-700 font-semibold rounded-md hover:bg-blue-50">
                Przejdź do rezerwacji
            </a>
        </div>
    </section>
@endsection
