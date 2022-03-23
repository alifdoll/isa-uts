<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"
        />
        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/fonts/icomoon/style.css') }}"
        />

        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/bootstrap.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/magnific-popup.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/jquery-ui.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/owl.carousel.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/owl.theme.default.min.css') }}"
        />

        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/aos.css') }}"
        />

        <link
            rel="stylesheet"
            href="{{ asset('shoppers-master/css/style.css') }}"
        />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        @yield('ajax')
        <style>
            .form-select {
                width: 100%;
                height: 40px;
                padding: 0 1rem 0 1rem;
                background-color: #7971e9;
                color: white;
            }

            .modal-dialog{
    position: relative;
    display: table; /* <-- This makes the trick */
    overflow-y: auto;    
    overflow-x: auto;
    width: auto;
    min-width: 300px;   
}
        </style>
    </head>

    <body>
        <div class="site-wrap">
            <header class="site-navbar" role="banner">
                <div class="site-navbar-top">
                    <div class="container">
                        <div class="row align-items-center">
                            <div
                                class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left"
                            ></div>

                            <div
                                class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center"
                            >
                                <div class="site-logo">
                                    <a href="/" class="js-logo-clone"
                                        >ADA.SHOP</a
                                    >
                                </div>
                            </div>

                            <div
                                class="col-6 col-md-4 order-3 order-md-3 text-right"
                            >
                                <div class="site-top-icons">
                                    <ul>
                                        @if (!Auth::check())
                                        <a
                                            href="/login"
                                            class="btn btn-primary btn-lg text-white"
                                            tabindex="-1"
                                            role="button"
                                            aria-disabled="true"
                                            >Login</a
                                        >

                                        <a
                                            href="/register"
                                            class="btn btn-white btn-lg text-black"
                                            tabindex="-1"
                                            role="button"
                                            aria-disabled="true"
                                            >Register</a
                                        >
                                        @else
                                        <li class="dropdown nav-item">
                                            <a href="#"
                                                ><span
                                                    >{{ Auth::user()->name }}
                                                </span></a
                                            >
                                        </li>
                                        <li>
                                            <a href="/cart" class="site-cart">
                                                <span
                                                    class="icon icon-shopping_cart"
                                                ></span>
                                                @if(session()->has('cart'))
                                                <span
                                                    class="count"
                                                    >{{ count(session()->get('cart')) }}</span
                                                >

                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <form
                                                id="logout-form"
                                                action="{{ route('logout') }}"
                                                method="post"
                                            >
                                                @csrf

                                                <a href="/login">
                                                    <button
                                                        type="submit"
                                                        aria-current="page"
                                                        style="
                                                            border: none;
                                                            background-color: transparent;
                                                        "
                                                    >
                                                        LOGOUT
                                                    </button>
                                                </a>
                                            </form>
                                        </li>
                                        <li
                                            class="d-inline-block d-md-none ml-md-0"
                                        >
                                            <a
                                                href="#"
                                                class="site-menu-toggle js-menu-toggle"
                                                ><span class="icon-menu"></span
                                            ></a>
                                        </li>

                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <nav
                    class="site-navigation text-right text-md-center"
                    role="navigation"
                >
                    <div class="container">
                        <ul class="site-menu js-clone-nav d-none d-md-block">
                            <li>
                                <a href="/">Home</a>
                            </li>

                            <li><a href="/products">Shop</a></li>
                            @if(Auth::check())
                            <li><a href="/history">History</a></li>

                            <li><a href="/compare">Compare</a></li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </header>

            @yield('content')

            <footer class="site-footer border-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-5 mb-lg-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="footer-heading mb-4">
                                        Navigations
                                    </h3>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <ul class="list-unstyled">
                                        <li><a href="#">Sell online</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Shopping cart</a></li>
                                        <li><a href="#">Store builder</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <ul class="list-unstyled">
                                        <li><a href="#">Mobile commerce</a></li>
                                        <li><a href="#">Dropshipping</a></li>
                                        <li>
                                            <a href="#">Website development</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <ul class="list-unstyled">
                                        <li><a href="#">Point of sale</a></li>
                                        <li><a href="#">Hardware</a></li>
                                        <li><a href="#">Software</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <h3 class="footer-heading mb-4">Promo</h3>
                            <a href="#" class="block-6">
                                <img
                                    src="{{
                                        asset(
                                            'shoppers-master/images/hero_1.jpg'
                                        )
                                    }}"
                                    alt="Image placeholder"
                                    class="img-fluid rounded mb-4"
                                />
                                <h3 class="font-weight-light mb-0">
                                    Finding Your Perfect Shoes
                                </h3>
                                <p>Promo from nuary 15 &mdash; 25, 2019</p>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="block-5 mb-5">
                                <h3 class="footer-heading mb-4">
                                    Contact Info
                                </h3>
                                <ul class="list-unstyled">
                                    <li class="address">
                                        203 Fake St. Mountain View, San
                                        Francisco, California, USA
                                    </li>
                                    <li class="phone">
                                        <a href="tel://23923929210"
                                            >+2 392 3929 210</a
                                        >
                                    </li>
                                    <li class="email">
                                        emailaddress@domain.com
                                    </li>
                                </ul>
                            </div>

                            <div class="block-7">
                                <form action="#" method="post">
                                    <label
                                        for="email_subscribe"
                                        class="footer-heading"
                                        >Subscribe</label
                                    >
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control py-4"
                                            id="email_subscribe"
                                            placeholder="Email"
                                        />
                                        <input
                                            type="submit"
                                            class="btn btn-sm btn-primary"
                                            value="Send"
                                        />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row pt-5 mt-5 text-center">
                        <div class="col-md-12">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script
                                    data-cfasync="false"
                                    src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
                                ></script>
                                ___scripts_1___ All rights reserved | This
                                template is made with
                                <i class="icon-heart" aria-hidden="true"></i> by
                                <a
                                    href="https://colorlib.com"
                                    target="_blank"
                                    class="text-primary"
                                    >Colorlib</a
                                >
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="{{
                asset('shoppers-master/js/jquery-3.3.1.min.js')
            }}"></script>
        <script src="{{ asset('shoppers-master/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('shoppers-master/js/popper.min.js') }}"></script>
        <script src="{{
                asset('shoppers-master/js/bootstrap.min.js')
            }}"></script>
        <script src="{{
                asset('shoppers-master/js/owl.carousel.min.js')
            }}"></script>
        <script src="{{
                asset('shoppers-master/js/jquery.magnific-popup.min.js')
            }}"></script>
        <script src="{{ asset('shoppers-master/js/aos.js') }}"></script>
        <script src="{{ asset('shoppers-master/js/main.js') }}"></script>

        @yield('ajax')
    </body>
</html>
