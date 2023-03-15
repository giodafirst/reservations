@extends('layouts.main')

@section('title','Fiche d\'un spectacle')

@section('content')
    <article>
        <h1>{{ $show->title }}</h1>

        @if($show->poster_url)
        <p><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
        @else
        <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
        @endif

        @if($show->location)
        <p><strong>Lieu de création : </strong>{{ $show->location->designation }}</p>
        {{-- dd($show->location) --}}
        @endif

        <p><strong>Prix : </strong>{{ $show->price }}€</p>

        @if($show->bookable)
        <p><em>Réservable</em></p>
        @else
        <p><em>Non réservable</em></p>
        @endif

        <h2>Liste des représentations</h2>

        @if($show->representations->count()>=1)
            <ul>
                @foreach($show->representations as $representation)
                <li>
                    <datetime>{{ date('d/m/Y H:i:s', strtotime($representation->when)) }}</datetime>
                    @if($representation->location)
                    ({{ $representation->location->designation }})
                    @elseif($representation->show->location)
                    ({{ $representation->show->location->designation }})
                    @else
                    (lieu à déterminer)
                    @endif
                </li>
                @endforeach
            </ul>
        @else
        <p>Aucune représentation</p>
        @endif

        <h2>Liste des artistes</h2>
        <p><strong>Producteur : </strong>
        @if (isset($collaborateurs['producteur']))
        @foreach($collaborateurs['producteur'] as $producteur)
        {{ $producteur->firstname }}
        {{ $producteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>Metteur en scène : </strong>
        @if (isset($collaborateurs['metteur en scène']))

        @foreach($collaborateurs['metteur en scène'] as $metteurEnScene)
        {{ $metteurEnScene->firstname }}
        {{ $metteurEnScene->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>Acteur : </strong>
        @if (isset($collaborateurs['acteur']))

        @foreach($collaborateurs['acteur'] as $acteur)
        {{ $acteur->firstname }}
        {{ $acteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>Chanteur : </strong>
        @if (isset($collaborateurs['chanteur']))

        @foreach($collaborateurs['chanteur'] as $chanteur)
        {{ $chanteur->firstname }}
        {{ $chanteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>Technicien : </strong>
        @if (isset($collaborateurs['technicien']))

        @foreach($collaborateurs['technicien'] as $technicien)
        {{ $technicien->firstname }}
        {{ $technicien->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
       

        {{--<ul>
            @foreach($show->artistTypes as $collaborateur)
            <li>
                {{ $collaborateur->artist->firstname }}
                {{ $collaborateur->artist->lastname }}
                ({{ $collaborateur->type->type }})
            </li>
            @endforeach
        </ul>--}}
    </article>

    <nav><a href="{{ url()->previous() }}">Retour à l'index</a></nav>
@endsection