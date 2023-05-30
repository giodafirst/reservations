@extends('layouts.main')

@section('title','Liste des artistes')

@section('content')
    <h1 class="text-center pb-10">{{__('Liste des artistes')}}</h1>
    <ul class="pl-0">
        <li class="text-center pl-0 pb-10"><a href="{{ route('artist.create') }}">{{__('Ajouter')}}</a></li>
    </ul>
    <table class="text-center">
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
    <div class="pt-10 flex justify-center">{{ $artists->links() }}</div>
    @endsection