@extends('client.layout.app')
@section('content')
    <div class="section-slide">
        <div class="slide-home slide-fullscreen owl-carousel" data-animatein="fadeIn" data-animateout="fadeOut"
            data-margin="0" data-items="1" data-nav="true" data-autoplay="true" data-loop="true">
            <div class="item-slide" data-background="client/images/slide/slide3-2.jpg">
                <div class="full-height">
                    <div class="content-slide">
                        <p class="crimtext caption-medium">Best Design for</p>
                        <img src="client/images/slide/logo-slide4.png" alt="">
                        <p class="paragrap">It is a long established fact that a reader will be distracted by the
                            readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                            that</p>

                    </div>
                </div>
            </div>
            <div class="item-slide" data-background="client/images/slide/slide-f2.jpg">
                <div class="overlay"></div>
                <div class="full-height">
                    <div class="content-slide">
                        <p class="crimtext caption-small">The Fall Report</p>
                        <h2 class="caption-title-2">the summer 2023</h2>

                    </div>
                </div>
            </div>
            <div class="item-slide" data-background="client/images/slide/slide3-3.jpg">
                <div class="full-height">
                    <div class="content-slide">
                        <h2 class="caption-title-border">OFF 70% all products</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-trend">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="leka-banner-text banner-style2 dark">
                        <a href="#">
                            <figure><img src="client/images/b-4.png" alt=""></figure>
                            <span class="banner-text">
                                <span class="title-banner text-uppercase margin-bottom">OFF 65%</span>
                                <span class="desc-banner">GATHERED WAIST SHORTS WITH POCKETS </span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="leka-product-grid">
                        <p style="font-size: 30px">NEW PRODUCT</p>
                        <div>
                            <form action="{{url('/search_product')}}" method="GET" style="">
                                @csrf
                                <input type="text" name="search" style="width: 250px;height:37px">
                                <button type="submit" style="margin: 0;padding:6px">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="row">
                            
                            @foreach ($product as $products)
                                <div class="col-md-3 col-sm-6 col-xs-12 product">
                                    <div class="product-thumb">
                                        <a href="{{url('product_detail',$products->id)}}">
                                            <img src="/upload/{{ $products->image }}" style="width: 180px;height: 170px" alt="">
                                        </a>
                                        <div class="product-button">
                                            <a href="#" class="button-compare">Compare</a>
                                            <a href="#" class="button-wishlist">Wishlist</a>
                                            <a href="{{ url('product_detail', $products->id) }}" class="button-quickview">Quick
                                                view</a>
                                        </div>
                                    </div>
                                    
                                    <div class="product-info">
                                        <a href="{{url('product_detail',$products->id)}}"><h3>{{ $products->title }}</h3></a>
                                        <div style="display: flex;">
                                            @if ($products->discount_price != null)
                                                <span class="product-price"
                                                    style="margin-left: 5px;text-decoration-line: line-through;color:gray">{{ number_format($products->discount_price) }}VNĐ</span>
                                                <span class="product-price" style="margin-left: 5px">
                                                    {{ number_format($products->price) }}VNĐ</span>
                                            @else
                                                <span class="product-price">
                                                    {{ number_format($products->price) }}VNĐ</span>
                                            @endif
                                        </div>
                                        <form action="{{url('/add_cart',$products->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="button-add-to-cart" style="background-color: rgb(236, 232, 232);color: black">ADD TO CART</button>
                                            <input type="number" class="button-compare" value="1" min="1" name="quantity" style="width:40px;height:40px;border:none">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            <div style="display: flex;justify-content: center;width: 100%;">
                                {{ $product->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <section class="section-services-3 bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="service">
                        <div class="service-title">
                            <span class="service-icon"><i class="fa fa-plane"></i></span>
                            <h4>FREESHIPPING</h4>
                            <p class="service-desc">We Are Free Shipping World Wide</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <div class="service-title">
                            <span class="service-icon"><i class="fa fa-whatsapp"></i></span>
                            <h4>best support</h4>
                            <p class="service-desc">We provide best services &amp; support</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="service">
                        <div class="service-title">
                            <span class="service-icon"><i class="fa fa-gift"></i></span>
                            <h4>GIFT DISCOUNT</h4>
                            <p class="service-desc">Flats , Coupon, sale off</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section-trend">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="leka-product-grid">
                        <p style="font-size: 30px">TOP FAVORITE PRODUCTS</p>
                        <div class="row">
                            @foreach ($pro_view as $products)
                                <div class="col-md-3 col-sm-6 col-xs-12 product">
                                    <div class="product-thumb">
                                        <a href="{{url('product_detail',$products->id)}}">
                                            <img src="/upload/{{ $products->image }}" style="width: 180px;height: 170px" alt="">
                                        </a>
                                        <div class="product-button">
                                            <a href="#" class="button-compare">Compare</a>
                                            <a href="#" class="button-wishlist">Wishlist</a>
                                            <a href="{{ url('product_detail', $products->id) }}" class="button-quickview">Quick
                                                view</a>
                                        </div>
                                    </div>
                                    
                                    <div class="product-info">
                                        <a href="{{url('product_detail',$products->id)}}"><h3>{{ $products->title }}</h3></a>
                                        <div style="display: flex;">
                                            @if ($products->discount_price != null)
                                                <span class="product-price"
                                                    style="margin-left: 5px;text-decoration-line: line-through;color:gray">{{ number_format($products->discount_price) }}VNĐ</span>
                                                <span class="product-price" style="margin-left: 5px">
                                                    {{ number_format($products->price) }}VNĐ</span>
                                            @else
                                                <span class="product-price">
                                                    {{ number_format($products->price) }}VNĐ</span>
                                            @endif
                                        </div>
                                        <form action="{{url('/add_cart',$products->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="button-add-to-cart" style="background-color: rgb(236, 232, 232);color: black">ADD TO CART</button>
                                            <input type="number" class="button-compare" value="1" min="1" name="quantity" style="width:40px;height:40px;border:none">
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="leka-banner-text banner-style2">
                        <a href="#">
                            <figure><img src="client/images/b-5.png" alt=""></figure>
                            <span class="banner-text">
                                <span class="sub-title text-uppercase">LOOK 14</span>
                                <span class="title-banner text-uppercase">BOHO</span>
                                <span class="desc-banner">MILITARY STYLE COAT</span>
                            </span>
                        </a>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
@endsection