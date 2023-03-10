@extends('layouts.main')

@section('title','Liste des représentations')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
    <h2>Recherche par titre, mot-clef ou par date</h2>

    <form action="{{ route('representation.search') }}" method="GET">
        <input type="text" name="query" placeholder="Recherche...">
        <input type="date" name="date">
        <button type="submit">Rechercher</button>
    {{-- </form>
    <form action="{{ route('representation.order') }}" method="get"> --}}
        <label for="filterBy">Filtrer par : </label>
        <select name="filterBy" id="filterBy">
            <option value="shows.title" selected>A->Z</option>
            <option value="shows.location_id">Commune</option>
            <option value="when">Date</option>
            <option value="price">Prix</option>
        </select>
    </form>
   
    <ul>
            @foreach($representations as $representation)
                <li>{{ $representation->title }}

                    - <span>{{ $representation->designation }}</span>
                    - <datetime>{{ date('d/m/Y H:i', strtotime($representation->when)) }}</datetime>
                    - <span>{{ $representation->price }}</span>

                </li>
            @endforeach

            

    </ul>
@endsection