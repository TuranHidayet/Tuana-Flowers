<header class="ltn__header-area ltn__header-3 section-bg-6">
    <div class="ltn__header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo">
                        <a href="{{route('app.home')}}"><img src="{{ asset('front/img/logo.png') }}" alt="Logo"></a>

                    </div>
                </div>
                <div class="col header-contact-serarch-column d-none d-xl-block">
                    <div class="header-contact-search">
                        <div class="header-feature-item">
                            <div class="header-feature-icon">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="header-feature-info">
                                <h6>Phone</h6>
                                <p><a href="tel:+994519489523">{{$settings->phone}}</a></p>
                            </div>
                        </div>
                        <div class="header-search-2">
                            <form id="#123" method="get"  action="#">
                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                <button type="submit">
                                    <span><i class="icon-magnifier"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ltn__header-options">
                        <ul>
                            <li class="d-none">
                                <div class="ltn__drop-menu ltn__currency-menu">
                                    <ul>
                                        <li><a href="#" class="dropdown-toggle"><span class="active-currency">USD</span></a>
                                            <ul>
                                                <li><a href="">USD - US Dollar</a></li>
                                                <li><a href="">CAD - Canada Dollar</a></li>
                                                <li><a href="register.html">EUR - Euro</a></li>
                                                <li><a href="account.html">GBP - British Pound</a></li>
                                                <li><a href="wishlist.html">INR - Indian Rupee</a></li>
                                                <li><a href="wishlist.html">BDT - Bangladesh Taka</a></li>
                                                <li><a href="wishlist.html">JPY - Japan Yen</a></li>
                                                <li><a href="wishlist.html">AUD - Australian Dollar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="header-search-wrap">
                                    <div class="header-search-1">
                                        <div class="search-icon">
                                            <i class="icon-magnifier  for-search-show"></i>
                                            <i class="icon-magnifier-remove  for-search-close"></i>
                                        </div>
                                    </div>
                                    <div class="header-search-1-form">
                                        <form id="#" method="get"  action="#">
                                            <input type="text" name="search" value="" placeholder="Search here..."/>
                                            <button type="submit">
                                                <span><i class="icon-magnifier"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="d-none">
                                <div class="ltn__drop-menu user-menu">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i></a>
                                            <ul>
                                                <li><a href="login.html">Sign in</a></li>
                                                <li><a href="register.html">Register</a></li>
                                                <li><a href="account.html">My Account</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="mini-cart-icon mini-cart-icon-2">
                                    <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                        <span class="mini-cart-icon">
                                            <i class="icon-handbag"></i>
                                            <sup id="cart-count">0</sup>
                                        </span>
                                        <h6>
                                            <span>Your Cart</span>
                                            <span class="ltn__secondary-color" id="cart-total-price">$0.00</span>
                                        </h6>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="mobile-menu-toggle d-lg-none">
                                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                        <svg viewBox="0 0 800 600">
                                            <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                            <path d="M300,320 L540,320" id="middle"></path>
                                            <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white ltn__primary-bg---- menu-color-white---- d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col header-menu-column justify-content-center">
                    <div class="sticky-logo">
                        <div class="site-logo">
                            <a href="{{route('app.home')}}"><img src="{{asset('front/img/logo.png')}}" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="header-menu header-menu-2">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class="menu-icon"><a href="{{ route('app.home') }}">Home</a></li>

                                    <li class="menu-icon"><a href="{{route('app.shops.index')}}">Shops</a></li>
                                    <li class="menu-icon"><a href="{{ route('app.florists') }}">Florists</a></li>

                                    <li class="menu-icon"><a href="{{ route('app.contact') }}">Contact</a></li>
                                    @if(Auth::check())
                                        <li class="menu-icon"><a href="{{ route('app.profile') }}">Profile</a></li>
                                        <li class="menu-icon"><a href="{{ route('app.logout') }}">Logout</a></li>

                                    @else
                                        <li class="menu-icon"><a href="{{ route('app.login') }}">Login</a></li>
                                        <li class="menu-icon"><a href="{{ route('app.register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
