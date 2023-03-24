@extends('layouts.main')

@section('content')
    <style>
        table, tr, th, td {
            text-align: center;
            border-collapse: collapse;
            border: 1px solid black;
            min-width: 100px;
            min-height: auto;
        }
        .message{
            display: inline-block;
            padding: 5px;
            color:white;
            border-radius: 5px;
        }
        .button{
            padding: 5px;
            color:white;
            border: 1px solid black;
            border-radius: 5px;
            text-decoration: none;
        }
        .button:hover{
            color:silver;
        }
        div{
            margin: 15px;
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
            <p class="message" style="background-color: {{$color}}"> {{$message}} </p>
        @endif

        @foreach($shows as $show)
            <tr>
                <td>{{$show->title}}</td>
                <td>{{$show->description}}</td>
                <td>
                    @if($show->poster_url)
                        <img width="250" height="auto" src="{{ asset('/storage/./'.$show->poster_url) }}" alt="{{ $show->title }}" title="{{ $show->title }}">
                    @else
                        <img width="250" height="auto" src="https://thumbs.dreamstime.com/b/transparent-designer-must-have-fake-background-39672616.jpg">
                    @endif
                </td>
                <td>
                    @if($show->bookable)
                        <span style="color:green">Yes</span>
                    @else
                        <span style="color:red">No</span>
                    @endif
                </td>
                <td>{{$show->price}}€</td>
                <td>{{$show->location->designation}}</td>
                <td>
                    <div><a class="button" style="background-color: blue" href="{{route('show.show', ['id' => $show->id])}}">Details</a></div>
                    <div><a class="button" style="background-color: #d08700" href="{{route('show.update', ['id' => $show->id])}}">Update</a></div>
                    <form action="{{route('show.delete', ["id" => $show->id])}}" method="post">
                        @csrf
                        <button class="button" style="background-color: red">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        <a class="button" style="background-color: #7825c4" href="{{route('show.create')}}"> Create a new Show</a>
    </div>
@endsection
