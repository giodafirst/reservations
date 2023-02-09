@extends('layouts.main')

@section('title','Liste des roles')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
   
    <table>
            @foreach($roles as $role)
            <tr>
                <td>
                    <a href="{{ route('role.show', $role->id) }}">{{ $role->role }}</a>
                </td>
            </tr>
            @endforeach
    </table>
@endsection