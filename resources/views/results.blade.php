@extends('layout.app')

@section('title', 'Wyniki wyszukiwania rejsów | FerryShop')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-2xl font-bold mb-4">Wyniki: {{ $query['from'] }} → {{ $query['to'] }} ({{ \Illuminate\Support\Carbon::parse($query['date'])->format('d.m.Y') }})</h1>
        <p class="text-sm text-gray-600 mb-6">
            Pasażerowie: {{ $query['passengers'] }}, Pojazd: {{ $query['vehicle'] ?? 'none' }}
        </p>

        <div class="grid md:grid-cols-2 gap-6">
            @forelse ($results as $r)
                <article class="bg-white border rounded-xl p-5">
                    <div class="flex items-center justify-between">
                        <div class="font-semibold">{{ $r['operator'] }}</div>
                        <div class="text-sm text-gray-500">{{ $r['date'] }}</div>
                    </div>
                    <div class="mt-2 flex items-center gap-4 text-sm text-gray-700">
                        <span>Wypłynięcie: <strong class="text-gray-900">{{ $r['depart'] }}</strong></span>
                        <span>Przypłynięcie: <strong class="text-gray-900">{{ $r['arrive'] }}</strong></span>
                    </div>
                    <div class="mt-3">
                        <span class="text-lg font-semibold">{{ number_format($r['price'], 2, ',', ' ') }} zł</span>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Wybierz</a>
                    </div>
                </article>
            @empty
                <p>Brak dostępnych połączeń dla wybranych parametrów.</p>
            @endforelse
        </div>

        <div class="mt-8">
            <a href="{{ route('home') }}" class="text-blue-700 hover:text-blue-800">← Zmień wyszukiwanie</a>
        </div>
    </div>
@endsection
