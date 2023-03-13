@extends('layouts.main')

@section('title','Liste des représentations')

@section('content')
    <h1 class="text-xl">Liste des {{ $resource }}</h1>
    <h2>Recherche par titre, mot-clef ou par date</h2>

    <form action="{{ route('representation.search') }}" method="GET">
        <input type="text" name="query" placeholder="Recherche...">
        <input type="date" name="date">
        <button type="submit">Rechercher</button>
    </form>

   
    <ul>
            @foreach($representations as $representation)
                <li>{{ $representation->title }}

                    - <span>{{ $representation->designation }}</span>
                    - <datetime>{{ date('d/m/Y H:i:s', strtotime($representation->when)) }}</datetime>

                </li>
            @endforeach

            

    </ul>
    
    <div class="flex items-center">{{ $representations->links() }}</div>
@endsection