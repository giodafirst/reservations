@extends('layouts.main')

@section('title','Welcome to Tixhub')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <section class="col-6 col-12-narrower feature">
                <div class="image-wrapper first">
                    <a href="{{route('artist.index')}}" class="image featured first"><img src="images/pic01.jpg" alt="" /></a>
                </div>
                <header>
                    <h2>{{__('Liste des artistes')}}</h2>
                </header>
                <p>{{__('Ici vous trouverez la liste des artistes que vous admirez, et')}}<br /> {{__('pourrez voir dans quelles pièces ils joueront prochainement...')}}</p>
                <ul class="actions">
                    <li><a href="{{route('artist.index')}}" class="button">{{__('Voir tous les artistes')}}</a></li>
                </ul>
            </section>
            <section class="col-6 col-12-narrower feature">
                <div class="image-wrapper">
                    <a href="{{route('location.index')}}" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                </div>
                <header>
                    <h2>{{__('Toutes les salles')}}</h2>
                </header>
                <p>{{__('Regarder une salle près de chez vous, où la liste de toutes les salles')}}<br /> {{__('dans cette section...')}}</p>
                <ul class="actions">
                    <li><a href="{{route('location.index')}}" class="button">{{__('Voir toutes les salles')}}</a></li>
                </ul>
            </section>
        </div>
    </div>
</div>

<!-- Promo -->
<div id="promo-wrapper">
    <section id="promo">
        <h2>{{__('Faites la promotion de votre spectacle ici !!!')}}</h2>
        <a href="#footer" class="button">{{__('Nous contacter')}}</a>
    </section>
</div>

@endsection