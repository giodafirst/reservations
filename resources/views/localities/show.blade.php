@extends('layouts.main')

@section('title','Fiche d'\une localité')

@section('content')
    <h1>{{ ucfirst($locality->locality) }}</h1>
    <p>{{ locality->postal_code }} {{ locality->locality }}</p>
    <ul>
        @foreach($locality->locations as $location)
        <li>{{ $location-> }}</li>
    </ul>
    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection