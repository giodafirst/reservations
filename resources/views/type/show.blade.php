@extends('layouts.app')

@section('title','Fiche d\'un type')

@section('content')
    <h1>{{ $type->type }}</h1>

    {{--<h2>Liste des types</h2>--}
    <ul>
    {{--@foreach($artist->types as $type)--}}
    {{--    <li>{{ $type->type }}</li>--}}
    {{--@endforeach--}}
    </ul>


    <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
@endsection