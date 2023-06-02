@extends('client.layout.app')
@section('content')
    <section class="banner bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <p style="font-size: 35px" class="page-title">SHOP DETAIL</p>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <a href="#">SHOP DETAIL</a>
                </div>
            </div>
        </div>
    </section>
    <div class="maincontainer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="single-images">
                        <a class="popup-image" href=""><img class="main-image"
                                src="/upload/{{ $product->image }}" alt="" /></a>
                        <div class="single-product-thumbnails">
                            <span data-image_full="client/images/products/product-full1.jpg"><img
                                    src="client/images/products/p-thumb1.jpg" /></span>
                            <span data-image_full="client/images/products/product-full2.jpg"><img
                                    src="client/images/products/p-thumb2.jpg" /></span>
                            <span class="selected" data-image_full="client/images/products/product-full3.jpg"><img
                                    src="client/images/products/p-thumb3.jpg" /></span>
                            <span data-image_full="client/images/products/product-full4.jpg"><img
                                    src="client/images/products/p-thumb4.jpg" /></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="summary entry-summary">
                        <h1 class="product_title entry-title">{{ $product->title }}</h1>
                        <div class="product-star edo-star" title="Rated 1 out of 5">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <a href="#reviews" class="woocommerce-review-link review-link">1 Review(s) | Add Your Review</a>
                        <span class="in-stock"><i class="fa fa-check-circle-o"></i> In stock</span>
                        <div class="description">
                            <p>{{ $product->description }}</p>
                        </div>
                        @if ($product->discount_price != null)
                            <p class="price">
                                <ins><span class="amount">{{ number_format($product->price) }}VNĐ</span></ins>
                                <del><span class="amount">{{ number_format($product->discount_price) }}VNĐ</span></del>
                            </p>
                        @else
                            <p class="price">
                                <ins><span class="amount">{{ number_format($product->price) }}VNĐ</span></ins>
                            </p>
                        @endif
                        <form class="variations_form" action="{{ url('/add_cart', $product->id) }}" method="POST">
                            <div class="single_variation_wrap">
                                @csrf
                                <button type="submit" class="button-add-to-cart"
                                    style="width: 150px;height:40px;padding: 0px;">ADD TO CART</button>
                                <div class="box-qty">
                                    <input type="number" step="1" min="1" name="quantity" value="01"
                                        title="Qty" class="input-text qty text" size="4">
                                </div>
                            </div>
                        </form>
                        <div class="sigle-product-services">
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-plane"></i></div>
                                <h5 class="service-name">FREE SHIPPING WORLD WIDE</h5>
                            </div>
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-whatsapp"></i></div>
                                <h5 class="service-name">24/24 ONLINE SUPPORT CUSTOME</h5>
                            </div>
                            <div class="services-item">
                                <div class="icon"><i class="fa fa-usd"></i></div>
                                <h5 class="service-name">30 Days money back</h5>
                            </div>
                        </div>
                        <div class="product-share">
                            <strong>Share:</strong>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-tencent-weibo"></i></a>
                            <a href="#"><i class="fa fa-vk"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product tab -->
            <div class="product-tabs">
                <ul class="nav-tab">
                    <li class="active"><a data-toggle="tab" href="#tab1">Reviews</a></li>
                </ul>
                <div class="tab-content">
                    <div id="tab1" class="active tab-pane">
                        <div class="reviews">
                            <div class="comments">
                                <h2>CUSTOMER REVIEWS ({{$totalComments}})</h2>
                                <ol class="commentlist">
                                    @foreach ($comments as $items)
                                    <li class="comment">
                                        <div class="comment_container">
                                            <div>
                                                <img class="avatar" src="client/images/avatars/3.png" alt="" />
                                                <span style="margin-left: 30px;color:rgb(78, 164, 206)">{{$items->name}}:</span>
                                            </div>
                                            
                                            <div class="comment-text">
                                                <div itemprop="description" class="description">
                                                    <p>"{{$items->content}}."</p>
                                                </div>
                                                <p class="meta">
                                                    <time>{{$items->created_at}}</time>
                                                </p>
                                                <div class="product-star" title="Rated 5 out of 5">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div style="display: flex;justify-content: center;width: 100%;">
                            {{ $comments->links() }}
                        </div>
                        <!-- Review form -->
                        <div class="review_form_wrapper" class="review_form_wrapper">
                            <div class="review_form">
                                <div class="comment-respond">
                                    <h3 class="comment-reply-title">WRITE YOUR COMMENT</h3>
                                    <form action="{{ url('/comment', $product->id) }}" method="POST"
                                        class="comment-form">
                                        @csrf
                                        <p class="comment-form-comment">
                                            <label for="comment">Your Comment</label>
                                            <textarea name="content" cols="45" rows="8" placeholder="Your Comment"></textarea>
                                        </p>
                                        <p class="form-submit">
                                            <input type="submit" class="submit" value="Submit">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!--./review form -->
                    </div>
                </div>
            </div>
            <!-- ./ Product tab -->
            <!--related products-->
            <div class="related-products">
                <div class="title-section text-center">
                    <h2 class="title">Similar products</h2>
                </div>
                <div class="product-slide owl-carousel" data-dots="false" data-nav="true" data-margin="30"
                    data-responsive='{"0":{"items":1},"600":{"items":3},"1000":{"items":4}}'>
                    @foreach ($simpro as $pro)
                        <div class="product">
                            <div class="product-thumb">
                                <a href="single-product.html">
                                    <img src="/upload/{{ $pro->image }}" alt="">
                                </a>
                                <div class="product-button">
                                    <a href="#" class="button-compare">Compare</a>
                                    <a href="#" class="button-wishlist">Wishlist</a>
                                    <a href="#" class="button-quickview">Quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ url('product_detail', $pro->id) }}">
                                    <h3>{{ $pro->title }}</h3>
                                </a>
                                <div style="display: flex;">
                                    @if ($pro->discount_price != null)
                                        <span class="product-price"
                                            style="padding-left:50px;text-decoration-line: line-through;color:gray">{{ number_format($pro->discount_price) }}VNĐ</span>
                                        <span class="product-price"
                                            style="margin-left: 20px">{{ number_format($pro->price) }}VNĐ</span>
                                    @else
                                        <span class="product-price">
                                            {{ number_format($pro->price) }}VNĐ</span>
                                    @endif
                                </div>
                                <form action="{{ url('/add_cart', $pro->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="button-add-to-cart"
                                        style="background-color: rgb(236, 232, 232);color: black">ADD TO CART</button>
                                    <input type="number" class="button-compare" value="1" min="1"
                                        name="quantity" style="width:40px;height:40px;border:none">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--./related products-->
        </div>
    </div>
@endsection
