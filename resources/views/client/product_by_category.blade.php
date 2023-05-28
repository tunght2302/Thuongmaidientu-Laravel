<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.kutethemes.com/leka/html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 May 2023 03:03:18 GMT -->

<head>
    <base href="/public">
    @include('client.css')
</head>

<body class="home">
    <header class="header header-style3">
        @include('client.header')
    </header>
    <section class="banner bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="page-title">SHOP</h2>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <a href="{{url('/shop')}}">Shop</a>
                </div>
            </div>
        </div>
    </section>
    <div class="maincontainer left-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9 main-content">
                    <!-- Sortbar -->
                    <div class="sortBar">
                        <div class="sortBar-left">
                            <form class="ordering">
                                <select>
                                    <option value="">SHORT BY</option>
                                    <option value="">Sort by popularity</option>
                                    <option value="">Sort by average rating</option>
                                    <option value="">Sort by price: low to high</option>
                                </select>
                                <select>
                                    <option value="">Postion</option>
                                    <option value="">Sort by popularity</option>
                                    <option value="">Sort by average rating</option>
                                    <option value="">Sort by price: low to high</option>
                                </select>
                            </form>
                            <div class="display-product-option">
                                <a href="#" class="view-as-grid selected"><i class="fa fa-th-large"></i></a>
                                <a href="#" class="view-as-list"><i class="fa fa-th-list"></i></a>
                            </div>
                        </div>
                        <div class="sortBar-right">
                            <div class="result-count">
                                SHOW ITEMS 1 to 12 of 36 total
                            </div>
                        </div>
                    </div>
                    <!-- ./ SortBar -->
                    <!-- List products -->
                    <ul class="products row">
                        <h2>{{$category->category_name}}</h2>
                        @foreach ($products as $product)
                        <li class="product col-sm-6 col-md-4">
                            <div class="product-thumb">
                                <a href="{{url('product_detail',$product->id)}}">
                                    <img src="/upload/{{ $product->image }}" style="width: 300px;height: 280px" alt="">
                                </a>
                                <div class="product-button">
                                    <a href="#" class="button-compare">Compare</a>
                                    <a href="#" class="button-wishlist">Wishlist</a>
                                    <a href="{{ url('product_detail',$product->id) }}" class="button-quickview">Quick
                                        view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{url('product_detail',$product->id)}}"><h3>{{ $product->title }}</h3></a>
                                <div style="display: flex;">
                                    @if ($product->discount_price != null)
                                        <span class="product-price"
                                            style="margin-left: 5px;text-decoration-line: line-through;color:gray">{{ number_format($product->discount_price) }}VNĐ</span>
                                        <span class="product-price" style="margin-left: 5px">
                                            {{ number_format($product->price) }}VNĐ</span>
                                    @else
                                        <span class="product-price">
                                            {{ number_format($product->price) }}VNĐ</span>
                                    @endif
                                </div>
                                <form action="{{url('/add_cart',$product->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="button-add-to-cart" style="background-color: rgb(236, 232, 232);color: black">ADD TO CART</button>
                                    <input type="number" class="button-compare" value="1" min="1" name="quantity" style="width:40px;height:40px;border:none">
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <nav class="pagination">
                        <div style="display: flex;justify-content: center;width: 100%;">
                            {{ $products->links() }}
                        </div>
                    </nav>
                    <!-- ./ List Products -->
                </div>
                <!-- Sliderbar -->
                <div class="col-sm-4 col-md-3 sidebar">
                    <!-- Product category -->
                    <div class="widget widget_product_categories">
                        <h2 class="widget-title">By Categories</h2>
                        @foreach($categories as $category)
                            <a href="{{url('product_by_category',$category->category_name)}}">
                                <ul class="product-categories">
                                    <li>{{$category->category_name}}</li>
                                </ul>
                            </a>
                        @endforeach
                    </div>
                    <!-- ./Product category -->
                    <!-- Filter color -->
                    <div class="widget widget_layered_nav">
                        <h2 class="widget-title">BY COLORS</h2>
                        <ul>
                            <li><a href="#">RED</a></li>
                            <li><a href="#">BLUE</a></li>
                            <li><a href="#">CYAN</a></li>
                            <li><a href="#">ORANGER</a></li>
                            <li><a href="#">BLACK & WHITE</a></li>
                            <li><a href="#">PURPULE</a></li>
                        </ul>
                    </div>
                    <!-- ./Filter color -->
                    <!-- Filter price -->
                    <div class="widget widget_price_filter">
                        <h2 class="widget-title">BY PRICES</h2>
                        <div class="price_slider_wrapper">
                            <div class="amount-range-price">$50 - $350</div>
                            <div data-label-reasult="" data-min="0" data-max="500" data-unit="$"
                                class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                            <button class="button">Filter</button>
                        </div>
                    </div>
                    <!-- ./Filter price -->

                    <!-- Compare products -->
                    <div class="widget yith-woocompare-widget">
                        <h2 class="widget-title">COMPARE PRODUCTS</h2>
                        <div class="no-product" style="background: gray">
                            NO PRODUCTS HAVE COMPARE
                        </div>
                    </div>
                    <!-- ./Compare products -->

                    <!-- Product tags -->
                    <div class="widget widget_product_tag_cloud">
                        <h2 class="widget-title">POPULAR TAGS</h2>
                        <div class="tagcloud">
                            <a href="#">Cotton</a>
                            <a href="#">Leggings</a>
                            <a href="#">Men</a>
                            <a href="#">Shirt</a>
                            <a href="#">T-shirt</a>
                            <a href="#">COSMETIC</a>
                            <a href="#">SOFT WEAR</a>
                            <a href="#">ACCESSORIES</a>
                            <a href="#">LIFE STYLE</a>
                        </div>
                    </div>
                    <!-- ./Product tags -->
                </div>
                <!-- ./Sidebar -->
            </div>
        </div>
    </div>

    <div class="section-shopbrand section-shopbrand3 bg-parallax">
        @include('client.shop-brand')
    </div>
    <footer class="footer">
        @include('client.footer')
    </footer>
    @include('client.js')
</body>

</html>
