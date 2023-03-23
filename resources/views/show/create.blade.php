@extends('layouts.main')

@section('content')

    <h1> Create a new show</h1>

    <form action="{{route('show.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" required> </textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" required>
        </div>

        <div>
            <label for="bookable">Bookable</label>
            <input type="checkbox" name="bookable" id="bookable">
        </div>

        <div>
            <label for="poster_url">Poster URL</label>
            <input type="text" name="poster_url" id="poster_url" required>
        </div>

        <div>
            <label for="location_id">Location</label>
            <select name="location_id" required>
                @foreach($locations as $location)
                    <option value="{{$location->id}}">{{$location->designation}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button> Create </button>
        </div>
    </form>
@endsection


