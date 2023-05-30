@extends('layouts.main')

@section('title','Fiche d\'un artiste')

@section('content')
    <h1 class="text-center">{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    <ul class="pl-0">
    @foreach($artist->types as $type)
        <li class="text-center">{{ trans($type->type) }}</li>
    @endforeach
    </ul>

    <div class="text-center"><a href="{{ route('artist.edit', $artist->id) }}">{{__('Modifier')}}</a></div>

    <form class="text-center" action="{{ route('artist.delete',$artist->id) }}" method="post">
        @csrf 
        @method('DELETE')
        <button>{{__('Supprimer')}}</button>
    </form>

    <nav class="text-center"><a href="{{ route('artist.index') }}">{{__('Retour à l\'index')}}</a></nav>
@endsection