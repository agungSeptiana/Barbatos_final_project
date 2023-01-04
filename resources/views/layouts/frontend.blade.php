<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Barbatos') }} |  @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/logo/logo_title.png') }}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/easyzoom.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer.css') }}">

        <link rel="stylesheet" href="css/footer.css">

        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
    </head>
    <body>

        <!-- header start -->
            <header>
                <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                    <div class="container-fluid">
                        <div class="header-bottom-wrapper">
                            <div class="logo-2 furniture-logo ptb-30">
                                <a href="/">
                                    <img src="{{ asset('frontend/assets/img/logo/LOGO_NAVBAR.png') }}" alt=""  width="150">
                                </a>
                            </div>
                            <div class="menu-style-2 furniture-menu menu-hover">
                                <nav>
                                    <ul>
                                        <li>
                                            <img class="mx-2 mb-2" src="/img/home.png" alt="" width="25" height="25">
                                            <a href="/">home</a>
                                        </li>
                                        <li>
                                            <img class="mx-2 mb-2" src="/img/shop.png" alt="" width="25" height="25">
                                            <a href="{{ route('shop.index') }}">shop</a>
                                        </li>
                                        <li>
                                            <img class="mx-2 mb-2" src="/img/categories.png" alt="" width="25" height="25">
                                            <a href="#">Categories</a>
                                            <ul class="single-dropdown">
                                                @foreach($categories_menu as $category_menu)
                                                    <li><a href="{{ route('shop.index', $category_menu->slug) }}">{{ $category_menu->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li>
                                            <img class="mx-2 mb-2" src="/img/contact.png" alt="" width="25" height="25">
                                            <a href="/frontend/contact">contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-cart">
                                <a class="icon-cart-furniture" href="{{ route('cart.index') }}">
                                    <i class="ti-shopping-cart"></i>
                                    <span class="shop-count-furniture green">{{ \Cart::getTotalQuantity() }}</span>
                                </a>
                                @if (!\Cart::isEmpty())
                                    <ul class="cart-dropdown">
                                    @foreach (\Cart::getContent() as $item)
                                        @php
                                            $product = $item->associatedModel;
											$image = !empty($product->firstMedia) ? asset('storage/images/products/'. $product->firstMedia->file_name) : asset('frontend/assets/img/cart/3.jpg')
                                        @endphp
                                        <li class="single-product-cart">
                                            <div class="cart-img">
                                                <a href="{{ route('product.show', $product->slug) }}"><img src="{{ $image }}" alt="{{ $product->name }}" style="width:100px"></a>
                                            </div>
                                            <div class="cart-title">
                                                <h5><a href="{{ route('product.show', $product->slug) }}">{{ $item->name }}</a></h5>
                                                <span>{{ number_format($item->price) }} x {{ $item->quantity }}</span>
                                            </div>
                                            <div class="cart-delete">
                                                <form id="deleteCart" action="{{ route('cart.destroy', $item->id) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <a href="" onclick="event.preventDefault();document.getElementById('deleteCart').submit();" class="delete"><i class="ti-trash"></i></a>
                                            </div>
                                        </li>
                                     @endforeach
                                        <li class="cart-space">
                                            <div class="cart-sub">
                                                <h4>Subtotal</h4>
                                            </div>
                                            <div class="cart-price">
                                                <h4>{{ number_format(\Cart::getSubTotal()) }}</h4>
                                            </div>
                                        </li>
                                        <li class="cart-btn-wrapper">
                                            <a class="cart-btn btn-hover" href="{{ route('cart.index') }}">view cart</a>
                                            <a class="cart-btn btn-hover" href="{{ route('checkout.process') }}">checkout</a>
                                        </li>
                                    </ul>
                                 @endif   
                            </div>
                        </div>
                        <div class="row">
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li>
                                                <a href="/">HOME</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('shop.index') }}">shop</a>
                                            </li>
                                            <li><a href="#">categories</a>
                                                <ul>
                                                @foreach($categories_menu as $category_menu)
                                                    <li><a href="{{ route('shop.index', $category_menu->slug) }}">{{ $category_menu->name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="/frontend/contact"> Contact  </a></li>
                                        </ul>
                                    </nav>							
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-furniture wrapper-padding-2 border-top-3" style="border-bottom: 1px solid #e0e0e0;">
                    <div class="container-fluid">
                        <div class="furniture-bottom-wrapper">
                            <div class="furniture-login">
                                <ul>
                                    @guest
                                        <li>Get Access: <a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @else
                                        <li>Hello: <a href="{{ route('profile.index') }}">{{ auth()->user()->username }}</a></li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>
                            </div>
                            <div class="furniture-search">
                                <form>
                                    <input placeholder="I am Searching for . . ." type="text" name="q" autocomplete="off" id="search">
                                    <button disabled>
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="furniture-wishlist">
                                <ul>
                                    <li>
                                        <a href="{{ route('favorite.index') }}"><i class="ti-heart"></i> Favorites</a>
                                    </li>
                                    @auth
                                    <li>
                                        <a href="{{ route('orders.index') }}"><i class="ti-money"></i> Orders</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        <!-- header end -->

        @yield('content')

        <!-- footer -->
        <footer class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                            <a href="#"><img src="{{ asset('frontend/assets/img/logo/2.png') }}" alt=""></a>
                            <div class="footer-about-2">
                                <p>Ada yang bisa kami bantu ? <br> Hubungi kami pada contact disamping. </p>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Address: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>Jln Dr.SetiaBudi No.127 <br>Lembang-Bandung</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Phone: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>+628 (19) 331755 <br>+628 (12) 22335</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#"> Barbatos@domain.com</a> <br><a href="#"> Zean@mail.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Newsletter</h3>
                            <div class="footer-newsletter-2">
                                <p>Send us your mail or next updates</p>
                                <div id="mc_embed_signup" class="subscribe-form-5">
                                    <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                        <div id="mc_embed_signup_scroll" class="mc-form">
                                            <input type="email" value="" name="EMAIL" class="email" placeholder="Enter mail address" required>
                                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                            <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class=" py-3 px-3 d-flex flex-column flex-sm-row  border-top" style="background-color: #ebf3f6">
                    
                    <div class="foot1">
                        <div class="col mb-3 mt-5">
                            <img src="/img/logo_title.png" alt="" width="100px" height="100px">
                            <p>Barbatos Team.</p>
                          </div>
                    </div>
                    
                    <div class="foot2">
                        <div class="col mb-3 mt-5">
                            <img src="/img/logo_navbar.png" width="250px" height="120px" alt="">
                        </div>
                    </div>
                                        
                    <div class="foot3">
                        <div class="col mb-3 mt-3">
                          <a href="/frontend/contact"><p>About Us</p></a>
                          <p>You can Find Us</p>
                          <div class="container d-flex" style="margin-left: -20px">
                              <img class="mx-2 mb-2" src="/img/ig.png" alt="" width="25" height="25">
                              <img class="mx-2 mb-2" src="/img/facebook.png" alt="" width="25" height="25">
                              <img class="mx-2 mb-2" src="/img/twitter.png" alt="" width="25" height="25">
                              <a href="https://github.com/RezaMarchyana203040079/barbatos_project">
                                <img class="mx-2 mb-2" src="/img/github.png" alt="" width="25" height="25"></a>
                          </div>
                          <br>
                          <p class="text-muted">© <a href="">Barbatos</a> 2022.</p>
                        </div>
                    </div>
                  <div class="col mb-3">
              
                  </div>
                  <div class="col mb-3">
              
                  </div>
              </div>
        </footer>


     
       
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        @livewireScripts
		<!-- all js here -->
        <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                let bloodhound = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: '{{url("search")}}?productName=%QUERY%', //'/user/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                });

                $('#search').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'products',
                    source: bloodhound,
                    limit: 10,
                    display: function(data) {
                        return data.name  //Input value to be set when you select a suggestion.
                    },
                    templates: {
                        empty: [
                            '<div class="list-group-item">There are no matching search results</div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown">'
                        ],
                        suggestion: function(data) {
                            return '<div style="font-weight:normal; width:100%" class="list-group-item"><a href="{{url('product')}}/'+data.slug+'">' + data.name + '</a></div></div>'
                        }
                    }
                });
            });
        </script>
    </body>
</html>
