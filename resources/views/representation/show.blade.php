@extends('layouts.main')

@section('title','Fiche d\'une représentation')

@section('content')
    <article>
        <h1>Représentation du {{ $date }} à {{ $time }}</h1>

        <p><strong>Spectacle : </strong>{{ $representation->show->title }}</p>
        <p><strong>Lieu : </strong>
            @if($representation->location)
            {{ $representation->location->designation }}
            @else
            <em>à déterminer</em>
            @endif
        </p>
    </article>
    <!-- Filtre qui verifie bien si la representation est bien dispo -->
    @if($representation->show->bookable && $representation->when > date('Y-m-d H:i:s') )
    <p><strong>Prix:</strong> {{ $representation->show->price }} &#8364</p>
    <div class="lib-desc">
        <h2>Réserver</h2>
        <form method="POST" class="reserve" action="{{ route('reservations_checkout') }}">
            @csrf
            <label for="places">Places</label>
            <input type="number" id="places" name="places" min="1" value="{{ old('places') ?? 2 }}" >
            <input type="text" name="representation" value="{{ $representation->id }}" hidden>
            <button type="submit" class="button expanded">Payer</button>
        </form>
    </div>
    @endif
    <nav><a href="{{ route('representation.index') }}">Retour à l'index</a></nav>
@endsection
