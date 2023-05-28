@extends('layouts.main')
@section('title','Liste des spectacles')

@section('content')
    <h1>{{ __('Shows') }}</h1>
    <h2>{{ __('Search') }}</h2>

    <form action="{{ route('show.search') }}" method="GET">
        <input type="text" name="query" placeholder="{{ __('Search') }}...">
        <input type="date" name="date">
        <label for="sort">{{ __('ByLocality') }} :</label>
        <select name="postal_code" id="sort">
            <option value="none" selected>-----</option>
            @foreach($localities as $locality)
                <option value="{{$locality->postal_code}}">{{$locality->postal_code}}</option>
            @endforeach
        </select>
        <input type="checkbox" name="reservable" id="reservable">
        <label for="reservable">{{ __('Bookable') }} |</label>
        <button type="submit">{{ __('Search') }}</button>
    </form>

    <!-- Sort -->
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img alt="" title="" src="themes/dot.gif" class="icon ic_b_more">
            {{ __('Sort by') }}:
        </a>
        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'titre', 'order' => 'asc']) }}">{{ __('Title') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'titre', 'order' => 'desc' ]) }}">{{ __('Title (Descending)') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'zip', 'order' => 'asc']) }}">{{ __('Postal Code') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'zip', 'order' => 'desc']) }}">{{ __('Postal Code (Descending)') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'prix', 'order' => 'asc']) }}">{{ __('Price') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'prix', 'order' => 'desc']) }}">{{ __('Price (Descending)') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'reservable', 'order' => 'asc']) }}">{{ __('Bookable') }}</a>
            </li>
            <li class="dropdown-item">
                <a class="nav-link text-nowrap" href="{{ route('show.sort', ['sortBy' => 'reservable', 'order' => 'desc']) }}">{{ __('Bookable (Descending)') }}</a>
            </li>
        </ul>
    </div>

    <ul>
        @foreach($shows as $show)
            <li>
                <a href="{{ route('show.show', $show->id) }}">{{ $show->title }}</a>
                {{-- {{ $show->location_id }} --}}
            </li>
            @if($show->poster_url)
                <li>
                    <a href="{{ route('show.show', $show->id) }}" style="width:200px; display:inline-block;">
                        <img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200">
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('show.show', $show->id) }}" style="width:200px; display:inline-block;">
                        <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    <div class="flex items-center">{{ $shows->appends(request()->query())->links() }}</div>
@endsection
