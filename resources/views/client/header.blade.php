<div class="top-header">
    <div class="container">
        <div class="top-header-right">
            @if (Route::has('login'))
                @auth
                <ul>
                    <li >
                        <x-app-layout >
                        </x-app-layout>
                    </li>
                </ul>
                    
                @else
                    <ul>
                        <li><a style="color: aliceblue"  href="{{ route('login') }}"><i class="fa fa-key"></i> LOGIN</a></li>
                        <li><a style="color: aliceblue"href="{{ route('register') }}"><i class="fa fa-user"></i> REGISTER</a></li>
                    </ul>
                @endauth
            @endif
        </div>
    </div>
</div>
<div class="main-header">
    <div class="container main-header-inner">
        <div id="form-search" class="form-search">
            <form>
                <input type="text" placeholder="YOU CAN SEARCH HERE..." />
                <button class="btn-search"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="client/images/logo2.png" alt="" /></a>
                </div>
            </div>
            <div class="col-sm-10 col-md-10 col-lg-7 main-menu-wapper">
                <a href="#" class="mobile-navigation"><i class="fa fa-bars"></i></a>
                <nav id="main-menu" class="main-menu" style="margin-left: 100px">
                    <ul class="navigation">
                        <li>
                            <a href="{{url('/')}}">Home</a>
                        </li>
                       
                        <li><a href="{{url('/shop')}}">Shop</a></li>
                        <li>
                            <a href="/check_out">Check out</a>
                            <ul class="sub-menu">
                                <li><a href="portfolio-fullwidth.html">Portfolio fullwidth</a></li>
                                <li><a href="portfolio-3columns.html">Portfolio 3 clumns</a></li>
                                <li><a href="portfolio-masonry.html">Portfolio masonry</a></li>
                                <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact</a></li>
                        <li>
                            <a href="{{url('/blog')}}">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-list.html">Blog list</a></li>
                                <li><a href="blog-grid-2columns.html">Blog Grid 2 columns</a></li>
                                <li><a href="blog-grid-3columns.html">Blog Grid 3 columns</a></li>
                                <li><a href="blog-masonry.html">Blog masonry</a></li>
                                <li><a href="blog-detail.html">Blog Single post</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-2 col-md-2">
                <!-- Icon search -->
                <div class="icon-search">
                    <span class="icon"><i class="fa fa-search"></i></span>
                </div>
                <!-- ./Icon search -->
                <!-- Mini cart -->
                <div class="mini-cart">
                    <a class="icon" href="{{url('/show_cart')}}">Cart</a>
                </div>
                <!-- ./Mini cart -->
            </div>
        </div>
    </div>
</div>