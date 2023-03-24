<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="alternate" type="application/atom+xml" title="News" href="/feed">
    <title>Projet réservations - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        <div class="w-3/4">
            @include('partials.menu')
            @yield('content')
        </div>
        <form class="w-1/4 ml-auto" action="{{ route('language.switch')}}" method="POST">
            @csrf
            <label for="language">{{ __('Language') }} :</label>
            <select name="language" id="language">
                @foreach(config('app.locales') as $locale)
                <option value="{{ $locale }}" {{ app()->getLocale() === $locale ? 'selected' : '' }}>
                    {{ strtoupper($locale) }}
                </option>
                @endforeach
            </select>
            <button type="submit">{{ __('Search') }}</button>
        </form>

    </div>



</body>
</html>
