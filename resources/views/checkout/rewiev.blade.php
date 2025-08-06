@extends('layout.app')
@section('title', 'Podsumowanie zamówienia')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-4">Podsumowanie</h1>

        <div class="mb-6">
            <h2 class="font-semibold">Pasażer</h2>
            <p>{{ $passenger['name'] }} ({{ $passenger['email'] }})</p>
        </div>

        <table class="w-full border mb-6">
            <thead>
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Trasa</th>
                <th class="p-2 text-left">Data</th>
                <th class="p-2 text-left">Operator</th>
                <th class="p-2 text-left">Cena</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cart as $item)
                <tr>
                    <td class="p-2">{{ $item['from'] }} → {{ $item['to'] }}</td>
                    <td class="p-2">{{ $item['date'] }} {{ $item['depart'] }}</td>
                    <td class="p-2">{{ $item['operator'] }}</td>
                    <td class="p-2">{{ number_format($item['price'], 2, ',', ' ') }} zł</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <form method="POST" action="{{ route('checkout.pay') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Zapłać i zarezerwuj
            </button>
        </form>
    </div>
@endsection

