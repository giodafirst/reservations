

@extends('layouts.main')

@section('title','Liste des spectacles')

@section('content')
    <h1>{{ __('Shows') }}</h1>
    <h2>{{ __('Search') }}</h2>

    <form action="{{ route('show.search') }}" method="GET">
        <input type="text" name="query" placeholder="{{ __('Search') }}...">
        <input type="date" name="date">
        <label for="sortBy">{{ __('Sort') }} : </label>
        <select name="sortBy" id="sortBy">
            <option value="shows.title" selected>A->Z</option>
            <option value="shows.location_id">{{ __('Locality') }}</option>
            <option value="shows.bookable">{{ __('Bookable') }}</option>
            <option value="price">{{ __('Price') }}</option>
        </select>
        <label for="sort">Par commune :</label>
        <select name="postal_code" id="sort">
            <option value="none" selected>-----</option>
            @foreach($localities as $locality)
                <option value="{{$locality->postal_code}}">{{$locality->postal_code}}</option>
            @endforeach
        </select>

        <input type="checkbox" name="reservable" id="reservable">
        <label for="reservable">Reservable |</label>

        <button type="submit">{{ __('Search') }}</button>
    </form>
    <ul>
            @foreach($shows as $show)
                <li><a href="{{ route('show.show', $show->id) }}">{{ $show->title }}</a></li>
                @if($show->poster_url)
                <li><a href="{{ route('show.show', $show->id) }}" style="width:200px; display:inline-block;"><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></a></li>
                @else
                <li><a href="{{ route('show.show', $show->id) }}" style="width:200px; display:inline-block;"><canvas width="200" height="100" style="border:1px solid #000000;"></canvas></a></li>
                @endif
                    {{--@if($show->bookable)
                        <span>{{ $show->price }}€</span>
                    @endif

                    @if($show->representations->count()==1)
                    - <span>1 représentation</span>
                    @elseif($show->representations->count()>1)
                    - <span>{{ $show->representations->count() }} représentations</span>
                    @else
                    - <em>aucune représentation</em>
                    @endif--}}
            @endforeach
    </ul>

    <div class="flex items-center">{{ $shows->links() }}</div>

    {{--<h2>Liste des {{ $resource2 }}</h2>
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
    @endif--}}
    {{-- test --}}
    {{-- test --}}
@endsection
