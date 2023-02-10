@extends('layouts.main')

@section('title','Fiche d\'une localité et lieux')

@section('content')
    <h1>{{ $locality->postal_code }} {{ ucfirst($locality->locality) }}</h1>
    {{--dd($locality)--}}
    <ul>
    @foreach($locality->locations as $location)
        <li>{{ $location-> designation}}</li>
    @endforeach
    </ul>
    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection