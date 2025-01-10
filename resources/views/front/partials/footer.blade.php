<footer class="ltn__footer-area ">
    <div class="footer-top-area  section-bg-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">My Accoout</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="{{route('app.contact')}}">Contact us</a></li>
                                <li><a href="#">Shopping Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Quick Links</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Orders Tracking</a></li>
                                <li><a href="#">Size Guide</a></li>
                                <li><a href="#">My account</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Information</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Privacy Page</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Delivery Inforamtion</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Customer Service</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Help & Contact Us</a></li>
                                <li><a href="#">Returns & Refunds</a></li>
                                <li><a href="#">Online Stores</a></li>
                                <li><a href="#">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <h4 class="footer-title">About Our Shop</h4>
                        <div class="footer-logo d-none">
                            <div class="site-logo">
                                <img src="{{asset('front/img/logo.png')}}" alt="Logo">
                            </div>
                        </div>
                            <p>{{$settings->description}}</p>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-location-pin"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{$settings->address}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:+994519489523">{{$settings->phone}}</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="#">{{$settings->email}}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ltn__social-media mt-20 d-none">
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer-payment-img">
                            <img src="{{asset('front/img/icons/payment-6.png')}}" alt="Payment Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-5">
        <div class="container ltn__border-top-2">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="footer-copyright-left">
                        <div class="ltn__copyright-design clearfix">
                            <p>&copy; <span class="current-year"></span> - Just For You</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="footer-copyright-right text-right">
                        <div class="ltn__copyright-menu d-none">
                            <ul>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Claim</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                            </ul>
                        </div>
                        <div class="ltn__social-media ">
                            <ul>
                                <li><a href="{{$settings->facebook}}" title="Facebook"><i class="icon-social-facebook"></i></a></li>
                                <li><a href="{{$settings->twitter}}" title="Twitter"><i class="icon-social-twitter"></i></a></li>
                                <li><a href="{{$settings->linkedin}}" title="Pinterest"><i class="icon-social-pinterest"></i></a></li>
                                <li><a href="{{$settings->instagram}}" title="Instagram"><i class="icon-social-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
