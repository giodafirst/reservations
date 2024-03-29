
<!-- Header -->
<div id="header-wrapper">
    <div id="header" class="container">
        <!-- Logo -->
        <h1><a id="logo" href="/"><x-application-logo /></a></h1>
        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="/">{{__('Accueil')}}</a></li>
                <li><a href="{{route('show.index')}}">{{__('Spectacles')}}</a></li>
                <li><a href="{{route('artist.index')}}">{{__('Artistes')}}</a></li>
                <li><a href="{{route('location.index')}}">{{__('Salles')}}</a></li>
                <li><a href="{{route('representation.index')}}">{{__('Représentations')}}</a></li>
                @auth
                <li class="break"><a href="{{route('profile.edit')}}">{{__('Profile')}}</a></li>
                @if(auth()->user()->role == 'admin')<li><a href="{{route('show.all')}}">{{__('Admin')}}</a></li>@endif
                @if(!auth())<li class="break"><a href="{{route('login')}}">{{__('Se connecter')}}</a></li>@endif
                @endauth
                @guest
                <li class="break"><a href="{{route('dashboard')}}">{{__('Connexion')}}</a></li>
                <li><a href="{{route('register')}}">{{__('S\'inscrire')}}</a></li>
             @endguest   <li>
                
                <form class="" action="{{ route('language.switch')}}" method="POST">
                    @csrf
                    <label for="language"></label>
                    <select class="focus:ring-noir dark:focus:ring-noir focus:border-noir" name="language" id="language" onchange="this.form.submit()">
                        @foreach(config('app.locales') as $locale)
                            <option value="{{ $locale }}" {{ app()->getLocale() === $locale ? 'selected' : '' }}>
                                {{ strtoupper($locale) }}
                            </option>
                        @endforeach
                    </select>
                </form>
                </li>

            </ul>
        </nav>
    </div>
    @if(Request::is('/'))
    @include('partials.header')
@endif
