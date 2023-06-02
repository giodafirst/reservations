	<!-- Footer -->
    <div id="footer-wrapper">
        <div id="footer" class="container">
            <header class="major">
                <h2>Euismod aliquam vehicula lorem</h2>
                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur vel sem sit<br />
                dolor neque semper magna lorem ipsum feugiat veroeros lorem ipsum dolore.</p>
            </header>
            <div class="row">
                <section class="col-6 col-12-narrower">
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-6 col-12-mobile">
                                <input name="name" placeholder="{{__('Nom')}}" type="text" />
                            </div>
                            <div class="col-6 col-12-mobile">
                                <input name="email" placeholder="Email" type="text" />
                            </div>
                            <div class="col-12">
                                <textarea name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="{{__('Envoyer')}}" /></li>
                                    <li><input type="reset" value="{{__('Nettoyer')}}" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="col-6 col-12-narrower">
                    <div class="row gtr-0">
                        <ul class="divided icons col-6 col-12-mobile">
                            <li class="icon brands fa-twitter"><a href="#"><span class="extra">TWITTER</span></a></li>
                            <li class="icon brands fa-facebook-f"><a href="#"><span class="extra">FACEBOOK</span></a></li>
                            <li class="icon brands fa-dribbble"><a href="#"><span class="extra">DRIBBLE</span></a></li>
                        </ul>
                        <ul class="divided icons col-6 col-12-mobile">
                            <li class="icon brands fa-instagram"><a href="#"><span class="extra">INSTAGRAM</span></a></li>
                            <li class="icon brands fa-youtube"><a href="#"><span class="extra">YOU TUBE</span></a></li>
                            <li class="icon brands fa-pinterest"><a href="#"><span class="extra">PINTEREST</span></a></li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
        <div id="copyright" class="container">
            <ul class="menu">
                <li>&copy; Tixhub 2023</li>
            </ul>
        </div>
        <div class="hidden sm:flex items-center justify-center md:justify-end">
                <a href="{{ url('/rss') }}" class="text-header hover:text-gray-900"><img src="{{ asset('images/rss.svg') }}" alt="rss" class="h-6 items-center"></a>
             </div>
    </div>