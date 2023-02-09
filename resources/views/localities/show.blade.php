@extends('layouts.main')

@section('title','Liste des localités')

@section('content')
    <h2>Liste des {{ $resource }}</h2>
    <p>{{ locality->postal_code }} {{ locality->locality }}</p>
    <ul>
        @foreach($locality->locations as $location)
        <li>{{ $location-> }}</li>
    </ul>
@endsection