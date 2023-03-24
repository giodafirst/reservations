@extends('layouts.main')

@section('content')
    <style>
        body{
            text-align: center;
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
    </style>
    <h1> Update the show : {{$show->title}}</h1>

    <form action="{{route('show.update', ['id' => $show->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="{{$show->title}}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="{{$show->description}}" required></textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="{{$show->price}}" required>
        </div>

        <div>
            <label for="bookable">Bookable</label>
            <input type="checkbox" name="bookable" id="bookable" @if($show->bookable) checked @endif>
        </div>

        <div>
            <label for="poster_url">Poster</label>
            <input required type="file" name="poster_url" id="poster_url" accept="image/png, image/jpeg">
        </div>

        <div>
            <label for="location_id">Location</label>
            <select name="location_id" required>
                @foreach($locations as $location)
                    <option value="{{$location->id}}" @if($location->id==$show->location_id) selected @endif>{{$location->designation}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button class="button" style="background-color: blue"> Create </button>
        </div>
    </form>
@endsection


