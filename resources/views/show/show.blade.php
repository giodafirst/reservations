@extends('layouts.main')

@section('title','Fiche d\'un spectacle')

@section('content')
    <style>
        table, tr, th, td{
           border:1px solid black;
            text-align: center;
        }
    </style>
    <article>
        <h1>{{ $show->title }}</h1>

        @if($show->poster_url)

        <p><img width="250" height="auto" src="{{ asset('/storage/./'.$show->poster_url) }}" alt="{{ $show->title }}" title="{{ $show->title }}"></p>
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

        <h2>Collaborateurs </h2>
        @if(!empty($collaborateurs))
            <table>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Type</th>
                </tr>
            @foreach($collaborateurs as $collaborateur)

                    <tr>
                        <td>{{$collaborateur->firstname}}</td>
                        <td>{{$collaborateur->lastname}}</td>
                        <td>{{$collaborateur->type}}</td>
                    </tr>
            @endforeach
            </table>
        @else
            <p>Pas de collaborateurs</p>
        @endif

    </article>

    <nav><a href="{{ Route('show.index') }}{{-- url()->previous() --}}">{{ __('Back') }}</a></nav>
@endsection
