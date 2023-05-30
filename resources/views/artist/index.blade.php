@extends('layouts.main')

@section('title','Liste des artistes')

@section('content')
    <h1>{{__('Liste des artistes')}}</h1>
    <ul>
        <li><a href="{{ route('artist.create') }}">{{__('Ajouter')}}</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>{{__('Prénom')}}</th>
                <th>{{__('Nom de famille')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
            <tr>
                <td>{{ $artist->firstname }}</td>
                <td>
                    <a href="{{ route('artist.show', $artist->id) }}">{{ $artist->lastname }}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection