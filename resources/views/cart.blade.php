@extends('layout.app')
@section('title', 'Twój koszyk')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-6">Koszyk</h1>

        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-300 text-green-700 p-3 rounded">{{ session('success') }}</div>
        @endif

        @if (count($cart) === 0)
            <p>Twój koszyk jest pusty.</p>
        @else
            <table class="w-full border mb-6">
                <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Trasa</th>
                    <th class="p-2 text-left">Data</th>
                    <th class="p-2 text-left">Operator</th>
                    <th class="p-2 text-left">Cena</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cart as $i => $item)
                    <tr>
                        <td class="p-2">{{ $item['from'] }} → {{ $item['to'] }}</td>
                        <td class="p-2">{{ $item['date'] }} {{ $item['depart'] }}</td>
                        <td class="p-2">{{ $item['operator'] }}</td>
                        <td class="p-2">{{ number_format($item['price'], 2, ',', ' ') }} zł</td>
                        <td class="p-2">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="index" value="{{ $i }}">
                                <button class="text-red-600 hover:underline">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <a href="{{ route('checkout.passengers') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Przejdź do rezerwacji
            </a>
        @endif
    </div>
@endsection
