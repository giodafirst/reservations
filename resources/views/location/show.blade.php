@extends('layouts.main')

@section('title','Fiche d\'un lieu de spectacle')

@section('content')
    <article>
        <h1 class="text-center pb-10">{{ $location->designation }}</h1>
        <address class="text-center pb-10">
            <p>{{ $location->address }}</p>
            <p>{{ $location->locality->postal_code }} {{ $location->locality->locality }}</p>

            @if($location->website)
            <p><a href="{{ $location->website }}" target="_blank">{{ $location->website }}</a></p>
            @else
            <p>{{__('Pas de site web')}}</p>
            @endif

            @if($location->phone)
            <p><a href="tel:{{ $location->phone }}">{{ $location->phone }}</a></p>
            @else
            <p>{{__('Pas de téléphone')}}</p>
            @endif
        </address>
        <h2 class="text-center">{{__('Liste des spectacles')}}</h2>
        <ul class="text-center pl-0">
            @foreach($location->shows as $show)
            <li class="pl-0">{{ $show->title }}</li>
            @endforeach
        </ul>
    </article>
    <nav class="text-center"><a href="{{ route('location.index') }}">{{__('Retour à l\'index')}}</a></nav>
@endsection