@extends('layouts.main')

@section('title','Liste des lieux de spectacle')

@section('content')
    <h1 class="text-center pb-10">{{__('Liste des lieux de spectacle')}}</h1>
   
    <ul class="text-center">
            @foreach($locations as $location)
                <li><a href="{{ route('location.show', $location->id) }}">{{ $location->designation }}</a>
                @if($location->website)
                    - <a href="{{ $location->website }}">{{ $location->website }}</a>
                @endif
                </li>
            @endforeach
    </ul>
@endsection