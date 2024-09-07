<footer class="ps-footer ps-footer--2 ps-footer--organic">
    <div class="container">
        <div class="ps-footer__content">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="row">
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <aside class="widget widget_footer widget_contact-us">
                                <h4 class="widget-title">Contact us</h4>
                                <div class="widget_content">
                                    <p>Call Us</p>
                                    <h3>{{ get_setting('phone')->value ?? 'null' }}</h3>
                                    <p>{{ get_setting('business_address')->value ?? 'null' }} <br><a href="mailto:{{ get_setting('email')->value ?? 'null' }}">{{ get_setting('email')->value ?? 'null' }}</a></p>
                                    <ul class="ps-list--social">
                                       <li>
                                            <a class="facebook" target="_blank" href="{{ get_setting('facebook_url')->value ?? 'null' }}"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="{{ get_setting('twitter_url')->value ?? 'null' }}"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="{{ get_setting('google_url')->value ?? 'null' }}"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="instagram" href="{{ get_setting('instagram_url')->value ?? 'null' }}"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6 col-6 ">
                            <aside class="widget widget_footer">
                                <h4 class="widget-title">Popular Pages</h4>
                                <ul class="ps-list--link">
                                    @foreach(get_pages_both_footer() as $page)
                                    <li>
                                        <a href="#">{{ $page->name_en }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6 col-12 ">
                            <aside class="widget widget_footer">
                                <h4 class="widget-title">Bussiness</h4>
                                <ul class="ps-list--link">
                                    <li><a href="our-press.html">Our Press</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <aside class="widget widget_newletters">
                        <h4 class="widget-title">Newsletter</h4>
                        <form class="ps-form--newletter" action="#" method="get">
                            <div class="form-group--nest">
                                <input class="form-control" type="text" placeholder="Email Address" />
                                <button class="ps-btn">Subscribe</button>
                            </div>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
        <div class="ps-footer__copyright">
            <p>{{ get_setting('copy_right')->value ?? 'null' }} All Rights Reserved</p>

            <p><span>We Using Safe Payment For:</span>
                <a href="#">
                    <img src="{{ asset('frontend/assets/img/payment-method/1.jpg ')}}" alt="" />
                </a>
                <a href="#"><img src="{{ asset('frontend/img/payment-method/2.jpg ') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/img/payment-method/3.jpg ')}}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/img/payment-method/4.jpg ') }}" alt="" /></a>
                <a href="#"><img src="{{ asset('frontend/assets/img/payment-method/5.jpg ')}}" alt="" /></a>
            </p>
        </div>
    </div>
</footer>