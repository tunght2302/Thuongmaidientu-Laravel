@extends('client.layout.app')
@section('content')
    <section class="banner bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="page-title">SHOP</h2>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <a href="{{url('/shop')}}"><span>Shop</span></a>
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
                    <div>
                        <form action="{{url('/search_product_shop')}}" method="GET">
                            @csrf
                            <input type="text" name="search" style="width: 250px;height:40px">
                            <button type="submit" style="margin: 0;padding:6px">Tìm kiếm</button>
                        </form>
                    </div>
                    <!-- ./ SortBar -->
                    <!-- List products -->
                    <ul class="products row">
                        @foreach ($product as $products)
                            <li class="product col-sm-6 col-md-4">
                                <div class="product-thumb">
                                    <a href="{{ url('product_detail', $products->id) }}">
                                        <img src="/upload/{{ $products->image }}" style="width: 300px;height: 280px"
                                            alt="">
                                    </a>
                                    <div class="product-button">
                                        <a href="#" class="button-compare">Compare</a>
                                        <a href="#" class="button-wishlist">Wishlist</a>
                                        <a href="{{ url('product_detail', $products->id) }}"
                                            class="button-quickview">Quick
                                            view</a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h3><a href="{{ url('product_detail', $products->id) }}">{{ $products->title }}</a>
                                    </h3>
                                    <div style="display: flex;">
                                        @if ($products->discount_price != null)
                                            <span class="product-price"
                                                style="margin-left: 30px;text-decoration-line: line-through;color:gray">{{ number_format($products->discount_price) }}VNĐ</span>
                                            <span class="product-price" style="margin-left: 15px">
                                                {{ number_format($products->price) }}VNĐ</span>
                                        @else
                                            <div style="margin-left: 70px">
                                                <span class="product-price">
                                                    {{ number_format($products->price) }}VNĐ
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{ url('/add_cart', $products->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="button-add-to-cart"
                                            style="background-color: rgb(236, 232, 232);color: black">ADD TO
                                            CART</button>
                                        <input type="number" class="button-compare" value="1" min="1"
                                            name="quantity" style="width:45px;height:40px;border:none">
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <nav class="pagination">
                        <div style="display: flex;justify-content: center;width: 100%;">
                            {{ $product->links() }}
                        </div>
                    </nav>
                    <!-- ./ List Products -->
                </div>
                <!-- Sliderbar -->
                <div class="col-sm-4 col-md-3 sidebar">
                    <!-- Product category -->
                    <div class="widget widget_product_categories" >
                        <h2 class="widget-title">By Categories</h2>
                        @foreach ($categories as $category)
                            <div>
                                <a href="{{ url('product_by_category', $category->category_name) }}">
                                    <ul  class="product-categories">
                                        <li>{{ $category->category_name }}</li>
                                    </ul>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- ./Product category -->
                    <!-- Filter color -->
                    <div class="widget widget_layered_nav">
                        <h2 class="widget-title">BY COLORS</h2>
                        <ul>
                            <li>RED</li>
                            <li>BLUE</li>
                            <li>CYAN</li>
                            <li>ORANGER</li>
                            <li>BLACK & WHITE</li>
                            <li>PURPULE</li>
                        </ul>
                    </div>
                    <!-- ./Filter color -->
                    <!-- Filter price -->
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

@endsection
