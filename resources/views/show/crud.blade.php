@extends('layouts.main')

@section('content')
<h1> CRUD Catalogue </h1>
    <ul>
        <li><a href="{{route('show.create')}}">Create</a></li>
        <li><a href="{{route('show.index')}}">Read</a></li>
        <li><a href="#">Update</a></li>
        <li><a href="#">Delete</a></li>
    </ul>
@endsection
