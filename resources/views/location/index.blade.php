@extends('layouts.main')

@section('title','Liste des lieux de spectacle')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
   
    <table>
            @foreach($locations as $location)
            <tr>
                <td>
                    <a href="{{ route('location.show', $location->id) }}">{{ $location->designation }}</a>
                </td>
            </tr>
            @endforeach
    </table>
@endsection