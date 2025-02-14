@php
$categories = \App\Models\Category::where('status', 1)
->with(['subCategories' => function($query){
    $query->where('status', 1)
    ->with(['childCategories' => function($query){
        $query->where('status', 1);
    }]);
}])
->get();
@endphp
   <!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            <!-- header top start -->
           <!-- <div class="header-top bdr-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="welcome-message">
                                <p>Welcome to Corano Jewelry online store</p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="header-top-settings">
                                <ul class="nav align-items-center justify-content-end">
                                    {{-- <li class="curreny-wrap">
                                        $ Currency
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list curreny-list">
                                            <li><a href="#">$ USD</a></li>
                                            <li><a href="#">€ EURO</a></li>
                                        </ul>
                                    </li> --}}
                                    <li class="language">
                                        <img src="{{asset('frontend/img/icon/en.png')}}" alt="flag"> English
                                        <i class="fa fa-angle-down"></i>
                                        <ul class="dropdown-list">
                                            <li><a href="#"><img src="{{asset('frontend/img/icon/en.png')}}" alt="flag"> english</a></li>
                                            <li><a href="#"><img src="{{asset('frontend/img/icon/fr.png')}}" alt="flag"> french</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- header top end -->

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="{{url('/')}}">
                                    <img  src="{{asset($logoSetting->logo)}}" alt="Brand Logo">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li class="{{setActive(['home'])}}">
                                                <a href="/">Home</a>
                                            </li>
                                            <li class="position-static"><a href="#">Products <i class="fa fa-angle-down"></i></a>
                                                <ul class="megamenu dropdown">
                                                    @foreach ($categories as $category)
                                                    <li class="mega-title"><span>{{$category->name}}</span>
                                                        @if(count($category->subCategories) > 0)
                                                        <ul>
                                                            @foreach ($category->subCategories as $subCategory)
                                                                <li><a href="{{route('products.index', ['subcategory' => $subCategory->slug])}}">{{$subCategory->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach

                                                    {{-- <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="product-details.html">
                                                            <img src="{{asset('frontend/img/banner/img1-static-menu.jpg')}}" alt="">
                                                        </a>
                                                    </li> --}}
                                                    {{-- <li class="megamenu-banners d-none d-lg-block">
                                                        <a href="product-details.html">
                                                            <img src="{{asset('frontend/img/banner/img2-static-menu.jpg')}}" alt="">
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                            </li>
                                            <li><a href="#">Products <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    @foreach ($categories as $category)
                                                    <li><a href="{{route('products.index', ['category' => $category->slug])}}">{{$category->name}} <i class="{{ count($category->subCategories) > 0 ? 'fa fa-angle-right' : ''}} "></i></a>
                                                        @if(count($category->subCategories) > 0)
                                                        <ul class="dropdown">
                                                            @foreach ($category->subCategories as $subCategory)
                                                            <li><a  href="{{route('products.index', ['subcategory' => $subCategory->slug])}}">{{$subCategory->name}} <i class="{{ count($subCategory->childCategories) > 0 ? 'fa fa-angle-right' : ''}} "></i></a>
                                                                @if(count($subCategory->childCategories) > 0)
                                                                <ul class="dropdown">
                                                                    @foreach ($subCategory->childCategories as $childCategory)
                                                                    <li><a href="{{route('products.index', ['childcategory' => $childCategory->slug])}}">{{$childCategory->name}}</a> </li>
                                                                    @endforeach
                                                                </ul>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            {{-- <li><a href="blog-left-sidebar.html">Blog <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                                                    <li><a href="blog-list-left-sidebar.html">blog list left sidebar</a></li>
                                                    <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">blog list right sidebar</a></li>
                                                    <li><a href="blog-grid-full-width.html">blog grid full width</a></li>
                                                    <li><a href="blog-details.html">blog details</a></li>
                                                    <li><a href="blog-details-left-sidebar.html">blog details left sidebar</a></li>
                                                    <li><a href="blog-details-audio.html">blog details audio</a></li>
                                                    <li><a href="blog-details-video.html">blog details video</a></li>
                                                    <li><a href="blog-details-image.html">blog details image</a></li>
                                                </ul>
                                            </li> --}}
                                            <li><a class="{{setActive(['about'])}}" href="{{route('about')}}">About us</a></li>
                                            <li><a class="{{setActive(['contact'])}}" href="{{route('contact')}}">Contact us</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block" action="{{route('products.index')}}">
                                        <input 
                                            type="text" 
                                            name="search" 
                                            placeholder="Search entire store here" class="header-search-field" 
                                            value="{{request()->search}}">
                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">

                                                        @if (auth()->check())
                                                            @if (auth()->user()->role === 'user')
                                                            <li><a href="{{route('user.dashboard')}}">My account</a></li>
                                                            @elseif (auth()->user()->role === 'vendor')
                                                            <li><a href="{{route('vendor.dashbaord')}}">Vendor Dashboard</a></li>
                                                            @elseif (auth()->user()->role === 'admin')
                                                            <li><a href="{{route('admin.dashbaord')}}">Admin Dashboard</a></li>
                                                            @endif
                                                            <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <li><a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                                                            </form>
                                                        @else
                                                            <li><a href="{{route('login')}}">login-register</a></li>
                                                        @endif
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('user.wishlist.index')}}">
                                                <i class="pe-7s-like"></i>
                                                <div id="wishlist_count" class="notification">@if (auth()->check())
                                                    {{\App\Models\Wishlist::where('user_id', auth()->user()->id)->count()}}
                                                    @else
                                                    0
                                                    @endif</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification" id="cart-count">{{Cart::content()->count()}}</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header d-lg-none d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mobile-main-header">
                            <div class="mobile-logo">
                                <a href="{{url('/')}}">
                                    <img src="{{asset($logoSetting->logo)}}" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="mobile-menu-toggler">
                                <div class="mini-cart-wrap">
                                <a href="{{route('user.wishlist.index')}}">
                                    <i class="pe-7s-like"></i>
                                    <div id="mobile-wishlist_count" class="notification">@if (auth()->check())
                                        {{\App\Models\Wishlist::where('user_id', auth()->user()->id)->count()}}
                                        @else
                                        0
                                        @endif
                                    </div>
                                </a>
                                <a href="#" class="minicart-btn ms-2">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification" id="mobile-cart-count">{{Cart::content()->count()}}</div>
                                </a>
                                </div>
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile header top start -->
        </div>
        <!-- mobile header end -->
        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>

                <div class="off-canvas-inner">
                    <!-- search box start -->
                    <div class="search-box-offcanvas">
                        <form action="{{route('products.index')}}">
                            <input type="text" placeholder="Search Here..." value="{{request()->search}}">
                            <button class="search-btn"><i class="pe-7s-search"></i></button>
                        </form>
                    </div>
                    <!-- search box end -->

                    <!-- mobile menu start -->
                    <div class="mobile-navigation">

                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children {{setActive(['home'])}}"><a href="{{url('/')}}" >Home</a>
                                    
                                </li>
                                <li class="menu-item-has-children"><a href="#">Products</a>
                                    <ul class="megamenu dropdown">
                                        @foreach ($categories as $category)
                                            <li class="mega-title menu-item-has-children"><a href="{{route('products.index', ['category' => $category->slug])}}">{{$category->name}}</a>
                                            @if(count($category->subCategories) > 0)
                                            <ul class="dropdown">
                                                @foreach ($category->subCategories as $subCategory)
                                                    <li><a href="{{route('products.index', ['subcategory' => $subCategory->slug])}}">{{$subCategory->name}}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            </li>        
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a class="{{setActive(['about'])}}" href="{{route('about')}}">About us</a>
                                </li>
                                <li><a class="{{setActive(['contact'])}}" href="{{route('contact')}}">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->

                    <div class="mobile-settings">
                        <ul class="nav">
                            {{-- <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="currency" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Currency
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="currency">
                                        <a class="dropdown-item" href="#">$ USD</a>
                                        <a class="dropdown-item" href="#">$ EURO</a>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <div class="dropdown mobile-top-dropdown">
                                    <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        My Account
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="myaccount">
                                    @if (auth()->check())
                                        @if (auth()->user()->role === 'user')
                                        <a class="dropdown-item" href="{{route('user.dashboard')}}">My profile</a>
                                        @elseif (auth()->user()->role === 'vendor')
                                        <a class="dropdown-item" href="{{route('vendor.dashbaord')}}"> Vendor Dashboard</a>
                                        @elseif (auth()->user()->role === 'admin')
                                        <a class="dropdown-item" href="{{route('vendor.dashbaord')}}"> Admin</a>
                                        @endif

                                        <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="{{route('login')}}">login-register</a>
                                    @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <div class="off-canvas-contact-widget">
                            <ul>
                                <li><i class="fa fa-mobile"></i>
                                    <a href="#">{{$settings->contact_phone}}</a>
                                </li>
                                <li><i class="fa fa-envelope-o"></i>
                                    <a href="#">{{$settings->contact_email}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="off-canvas-social-widget">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- offcanvas mobile menu end -->
    </header>
    <!-- end Header Area -->