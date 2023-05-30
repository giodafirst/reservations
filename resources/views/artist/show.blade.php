@extends('layouts.main')

@section('title','Fiche d\'un artiste')

@section('content')
    <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    <ul>
    @foreach($artist->types as $type)
        <li>{{ trans($type->type) }}</li>
    @endforeach
    </ul>

    <div><a href="{{ route('artist.edit', $artist->id) }}">{{__('Modifier')}}</a></div>

    <form action="{{ route('artist.delete',$artist->id) }}" method="post">
        @csrf 
        @method('DELETE')
        <button>{{__('Supprimer')}}</button>
    </form>

    <nav><a href="{{ route('artist.index') }}">{{__('Retour à l\'index')}}</a></nav>
@endsection