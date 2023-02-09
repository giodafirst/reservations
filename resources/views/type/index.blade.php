@extends('layouts.main')

{{--@section('title','Liste des types d'artistes')--}}

@section('content')
    <h1>Liste des {{ $resource }}</h1>
   
    <table>
            @foreach($types as $type)
            <tr>
                <td>
                    <a href="{{ route('type.show', $type->id) }}">{{ $type->type }}</a>
                </td>
            </tr>
            @endforeach
    </table>
@endsection