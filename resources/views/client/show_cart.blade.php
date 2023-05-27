<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.kutethemes.com/leka/html/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 May 2023 03:03:18 GMT -->

<head>
    @include('client.css')
</head>

<body class="home">
    <header class="header header-style3">
        @include('client.header')
    </header>
    <section class="banner banner-cart bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="page-title">SHOPPING CART</h2>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <span>SHOPPING CART</span>
                </div>
            </div>
        </div>
    </section>
    <div class="maincontainer">
        <div class="container">
            <!-- Step Checkout-->
            <div class="step-checkout">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-2">
                        <div class="step cart active">
                            <div class="icon"></div>
                            <span class="step-count">01</span>
                            <h3 class="step-name">Shopping Cart</h3>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="step checkout">
                            <div class="icon"></div>
                            <span class="step-count">02</span>
                            <h3 class="step-name">Check out</h3>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="step complete">
                            <div class="icon"></div>
                            <span class="step-count">03</span>
                            <h3 class="step-name">Oder Complete</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./Step Checkout-->
            <!-- Table cart -->
            <table class="shop_table cart">
                <thead>
                    <tr>
                        <th class="product-name">Product_name</th>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-price">Price</th>
                        <th class="product-subtotal">Total price</th>
                        <th class="product-remove">&nbsp;</th>
                    </tr>
                </thead>
                <?php $total = 0 ?>
                <tbody>
                    <form action="{{url('/update_cart')}}" method="POST">
                        @csrf
                        @foreach ($carts as $cart)
                        <?php $total_price = $cart->quantity * $cart->price ?>
                        <?php $total += $total_price ?>
                            <tr class="cart_item">
                                <input type="hidden" name="cart_items[{{ $cart->id }}][id]" value="{{ $cart->id }}">
                                <td class="product-name">
                                    <h3 href="#">{{ $cart->product_title }}</h3>
                                </td>
                                <td class="product-thumbnail">
                                    <div style="margin-left: 60px">
                                        <img src="/upload/{{ $cart->image }}" style="width: 180px;height: 170px;" alt="" />
                                    </div>
                                </td>
                                <td class="product-quantity">
                                    <div >
                                        <input type="number" step="1" min="1" name="cart_items[{{ $cart->id }}][quantity]" value="{{$cart->quantity}}"
                                        style="width: 50px;heigth:50px;border:1.5px solid black;border-radius:3px">
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{number_format($cart->price)}}VNĐ</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{number_format($total_price)}}VNĐ</span>
                                </td>
                                <td class="product-remove">
                                    <a class="remove" onclick="return confirm('Are you sure to delete Product?')" href="{{url('delete_cart',$cart->id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="actions">
                                <input type="submit" class="button" name="update_cart" value="UPDATE SHOPPING CART">
                            </td>
                        </tr>
                    </form>
                    <tr>
                        <td colspan="3" class="actions">
                        <a href="{{url('/shop')}}"><button class="button pull-left" style="margin-right: 20px">CONTINUE SHOPPING</button></a>
                        <a href="{{url('/cart_destroy')}}"><button class="button pull-left">CLEAR SHOPPING CART</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="cart-collaterals">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="discount-codes">
                            <h2>Discount codes</h2>
                            <p class="notice">Enter your coupon code if you have one.</p>
                            <form class="form">
                                <p style="margin-bottom: 10px;margin-top: 10px"><input type="text" placeholder="COUPON CODE.." /></p>
                                <button class="button">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-6">
                        <div class="cart_totals ">
                            <h2>Cart Totals</h2>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td><span class="amount">Không có</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td>
                                            <strong><span class="amount">{{ number_format($total)}} VNĐ</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="{{url('/check_out')}}" class="checkout-button button alt wc-forward">PROCEED TO
                                    CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
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
