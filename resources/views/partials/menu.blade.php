
<!-- Header -->
<div id="header-wrapper">
    <div id="header" class="container">
        <!-- Logo -->
        <h1><a id="logo" href="/"><x-application-logo /></a></h1>
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{route('show.index')}}">Shows</a></li>
                <li><a href="{{route('artist.index')}}">Artists</a></li>
                <li><a href="{{route('location.index')}}">Localitions</a></li>
                @auth
                <li class="break"><a href="{{route('profile.edit')}}">profile</a></li>
                <li class="break"><a href="{{route('login')}}">Logout</a></li>
                @endauth
                @guest
                <li class="break"><a href="{{route('dashboard')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
                @endguest
            </ul>
        </nav>
    </div>
    @if(Request::is('/'))
    @include('partials.header')
@endif
