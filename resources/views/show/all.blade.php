@extends('layouts.main')

@section('content')
    <style>
        table, tr, th, td {
            border: 1px solid black;
        }
    </style>

    <h1> All shows</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Poster</th>
            <th>Bookable</th>
            <th>Price</th>
            <th>Location</th>
            <th>Actions</th>
        </tr>
        @if(isset($message))
            <p> {{$message}} </p>
        @endif

        @foreach($shows as $show)
            <tr>
                <td>{{$show->title}}</td>
                <td>{{$show->description}}</td>
                <td>{{$show->poster_url}}</td>
                @if($show->bookable)
                    <td>✅</td>
                @else
                    <td>❌</td>
                @endif
                <td>{{$show->price}}€</td>
                <td>{{$show->location->designation}}</td>
                <td>
                    <a href="{{route('show.details')}}"> Details </a> |
                    <a href="{{route('show.update')}}"> Update </a> |
                    <form action="{{route('show.delete', ["id" => $show->id])}}" method="post">
                        @csrf
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{route('show.create')}}"> Create a new Show</a>
@endsection
