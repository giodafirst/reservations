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
        <p><strong>{{ __('Location') }} : </strong>{{ $show->location->designation }}</p>
        {{-- dd($show->location) --}}
        @endif

        <p><strong>{{ __('Price') }} : </strong>{{ $show->price }}€</p>

        @if($show->bookable)
        <p><em>{{ __('Bookable') }}</em></p>
        @else
        <p><em>{{ __('NonBookable') }}</em></p>
        @endif

        <h2>{{ __('Representations') }}</h2>

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
        <p>{{ __('NoRepresentation') }}</p>
        @endif

        <h2>{{ __('Artists') }}</h2>
        <p><strong>{{ __('Producer') }} : </strong>
        @if (isset($collaborateurs['producteur']))
        @foreach($collaborateurs['producteur'] as $producteur)
        {{ $producteur->firstname }}
        {{ $producteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>{{ __('Director') }} : </strong>
        @if (isset($collaborateurs['metteur en scène']))

        @foreach($collaborateurs['metteur en scène'] as $metteurEnScene)
        {{ $metteurEnScene->firstname }}
        {{ $metteurEnScene->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>{{ __('Actor') }} : </strong>
        @if (isset($collaborateurs['acteur']))

        @foreach($collaborateurs['acteur'] as $acteur)
        {{ $acteur->firstname }}
        {{ $acteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>{{ __('Singer') }} : </strong>
        @if (isset($collaborateurs['chanteur']))

        @foreach($collaborateurs['chanteur'] as $chanteur)
        {{ $chanteur->firstname }}
        {{ $chanteur->lastname }}@if($loop->iteration==$loop->count-1) et @elseif(!$loop->last) , @endif
        @endforeach
        </p>
        @endif
        <p><strong>{{ __('Technician') }} : </strong>
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

    <nav><a href="{{ url()->previous() }}">{{ __('Back') }}</a></nav>
@endsection