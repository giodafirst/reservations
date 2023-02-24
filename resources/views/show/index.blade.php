@extends('layouts.main')

@section('title','Liste des spectacles')

@section('content')
    <h1>Liste des {{ $resource }}</h1>
   
    <ul>
            @foreach($shows as $show)
                <li><a href="{{ route('show.show', $show->id) }}">{{ $show->title }}</a>
                    @if($show->bookable)
                        <span>{{ $show->price }}€</span>
                    @endif

                    @if($show->representations->count()==1)
                    - <span>1 représentation</span>
                    @elseif($show->representations->count()>1)
                    - <span>{{ $show->representations->count() }} représentations</span>
                    @else
                    - <em>aucune représentation</em>
                    @endif
                </li>
            @endforeach
    </ul>
    <h2>Liste des {{ $resource2 }}</h2>
    <ul>
        @foreach($bookableshows as $bookableshow)
        <li>{{ $bookableshow->title }}</li>
        @endforeach
    </ul>

    <h2>Liste des {{ $resource3 }}</h2>
    @if(count($bookableshowsunder9))
    <ul>
        @foreach($bookableshowsunder9 as $bookableshowu9)
        <li>
            {{ $bookableshowu9->title }}
        </li>
        @endforeach
    </ul>
    @else
    <p>Pas trouvé de spectacle</p>
    @endif

    <h2>Liste des {{ $resource4 }}</h2>
    <ul>
        @foreach($bookableshowsbetween9and25 as $bookableshowbtw9a25)
        <li>{{ $bookableshowbtw9a25->title }}</li>
        @endforeach
    </ul>

    <h2>Liste des {{ $resource5 }}</h2>
    <ul>
        @foreach($showsfromlasamaritaine as $showfromlasamaritaine)
        <li>{{ $showfromlasamaritaine->title }}</li>
        @endforeach
    </ul>

    <h2>Liste des {{ $resource6 }}</h2>
    <ul>
        @foreach($brusselsShows as $brusselsShow)
        <li>{{ $brusselsShow->title }}</li>
        @endforeach
    </ul>

    <h2>Liste des {{ $resource7 }}</h2>
    @if(count($marcelinShows))
    <ul>
        @foreach($marcelinShows as $marcelinShow)
        <li>
            {{ $marcelinShow->title }}
        </li>
        @endforeach
    </ul>
    @else
    <p>Pas trouvé de spectacle</p>
    @endif

    <h2>Liste des {{ $resource8 }}</h2>
    @if(count($singleActorShows))
    <ul>
        @foreach($singleActorShows as $singleActorShow)
        <li>
            {{ $singleActorShow->title }}
        </li>
        @endforeach
    </ul>
    @else
    <p>Pas trouvé de spectacle</p>
    @endif
{{-- test --}}
@endsection