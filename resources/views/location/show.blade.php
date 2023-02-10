@extends('layouts.main')

@section('title','Fiche d\'un lieu de spectacle')

@section('content')
    <h1>{{ $location->designation }}</h1>
    
    <nav><a href="{{ route('location.index') }}">Retour à l'index</a></nav>
@endsection