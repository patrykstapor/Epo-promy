@extends('layout.app')
@section('title', 'Dane pasażera')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-10">
        <h1 class="text-2xl font-bold mb-4">Dane pasażera</h1>

        <form method="POST" action="{{ route('checkout.passengers') }}" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium">Imię i nazwisko</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <div>
                <label for="email" class="block font-medium">E‑mail</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                       class="w-full border rounded px-3 py-2 mt-1">
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Kontynuuj
            </button>
        </form>
    </div>
@endsection

