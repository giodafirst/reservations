@extends('layouts.app')

@section('title','Liste des types')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
    
        <div>
            @foreach($types as $type)
            <ul>
                <li><a href="{{ route('type.show', $type->id) }}">{{ $type->type }}</a></li>
            </ul>
            @endforeach
        </div>
    @endsection