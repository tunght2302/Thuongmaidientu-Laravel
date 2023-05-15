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
                                <h3><a href="#">{{ $products->title }}</a></h3>
                                <div style="display: flex;">
                                    @if ($products->discount_price != null)
                                        <span class="product-price"
                                            style="margin-left: 5px;text-decoration-line: line-through;color:gray">{{ number_format($products->discount_price) }}VNĐ</span>
                                        <span class="product-price" style="margin-left: 5px">
                                            {{ number_format($products->price) }}VNĐ</span>
                                    @else
                                        <span class="product-price" style="margin-left: 5px">
                                            {{ number_format($products->price) }}VNĐ</span>
                                    @endif
                                </div>
                                <form action="{{url('/add_cart',$products->id)}}" method="post">
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
