<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projet réservations - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        
        <div class="w-3/4">
            @yield('content')
        </div>
        <form class="w-1/4 ml-auto" action="{{ route('language.switch') }}" method="POST">
            @csrf
            <label for="language">Langue :</label>
            <select name="language" id="language">
                @foreach(config('app.locales') as $locale)
                <option value="{{ $locale }}" {{ app()->getLocale() === $locale ? 'selected' : '' }}>
                    {{ strtoupper($locale) }}
                </option>
                @endforeach
            </select>
        </form>

    </div>
    


</body>
</html>