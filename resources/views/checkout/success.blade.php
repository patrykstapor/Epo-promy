@extends('layout.app')
@section('title', 'Rezerwacja zakończona')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-10 text-center">
        <h1 class="text-2xl font-bold mb-4 text-green-700">Rezerwacja potwierdzona!</h1>
        <p>Dziękujemy za rezerwację. Twój numer biletu: <strong>{{ $id }}</strong></p>
        <p class="mt-4">Potwierdzenie wysłaliśmy na e-mail.</p>
        <a href="{{ route('home') }}" class="mt-6 inline-block text-blue-600 hover:underline">Wróć na stronę główną</a>
    </div>
@endsection

