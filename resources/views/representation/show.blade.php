@extends('layouts.main')

@section('title','Fiche d\'une représentation')

@section('content')
    <article class="text-center">
        <h1 class="pb-10">{{__('Représentation')}} {{__('du')}} {{ $date }} - {{ $time }}</h1>

        <p><strong>{{__('Spectacle')}} : </strong>{{ $representation->show->title }}</p>
        <p><strong>{{__('Lieu')}} : </strong>
            @if($representation->location)
            {{ $representation->location->designation }}
            @else
            <em>à déterminer</em>
            @endif
        </p>
    </article>
    <!-- Filtre qui verifie bien si la representation est bien dispo -->
    @if($representation->show->bookable && $representation->when > date('Y-m-d H:i:s') )
    <p class="text-center"><strong>{{__('Prix')}} :</strong> {{ $representation->show->price }} &#8364</p>
    <div class="text-center lib-desc">
        <h2>{{__('Réserver')}}</h2>
        <form method="POST" class="reserve" action="{{ route('reservations_checkout') }}">
            @csrf
            <label for="places">{{__('Places')}}</label>
            <input type="number" id="places" name="places" min="1" value="{{ old('places') ?? 2 }}" >
            <input type="text" name="representation" value="{{ $representation->id }}" hidden>
            <button type="submit" class="button expanded">{{__('Payer')}}</button>
        </form>
    </div>
    @endif
    <nav class="text-center pt-4"><a href="{{ route('representation.index') }}">{{__('Retour à l\'index')}}</a></nav>
@endsection
