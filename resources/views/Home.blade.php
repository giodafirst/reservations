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
                    <h2>The list of
                        artists</h2>
                </header>
                <p>here you can see the list of your artists that you follow, and see<br /> in which pieces they will play soon...</p>
                <ul class="actions">
                    <li><a href="{{route('artist.index')}}" class="button">see all artists</a></li>
                </ul>
            </section>
            <section class="col-6 col-12-narrower feature">
                <div class="image-wrapper">
                    <a href="{{route('location.index')}}" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
                </div>
                <header>
                    <h2>All locations</h2>
                </header>
                <p>Look for a venue near you, or simply see the list of performance halls<br /> right here in this section...</p>
                <ul class="actions">
                    <li><a href="{{route('location.index')}}" class="button">see all venues</a></li>
                </ul>
            </section>
        </div>
    </div>
</div>

<!-- Promo -->
<div id="promo-wrapper">
    <section id="promo">
        <h2>Neque semper magna et lorem ipsum adipiscing</h2>
        <a href="#" class="button">Breach the thresholds</a>
    </section>
</div>

<!-- Features 2 -->
<div class="wrapper">
    <section class="container">
        <header class="major">
            <h2>Sed magna consequat lorem curabitur tempus</h2>
            <p>Elit aliquam vulputate egestas euismod nunc semper vehicula lorem blandit</p>
        </header>
        <div class="row features">
            <section class="col-4 col-12-narrower feature">
                <div class="image-wrapper first">
                    <a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
            </section>
            <section class="col-4 col-12-narrower feature">
                <div class="image-wrapper">
                    <a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
            </section>
            <section class="col-4 col-12-narrower feature">
                <div class="image-wrapper">
                    <a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur
                vel sem sit dolor neque semper magna lorem ipsum.</p>
            </section>
        </div>
        <ul class="actions major">
            <li><a href="#" class="button">Elevate my awareness</a></li>
        </ul>
    </section>
</div>

@endsection