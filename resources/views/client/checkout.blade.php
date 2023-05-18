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
                <h2 class="page-title">CHECK OUT</h2>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <span>CHECK OUT</span>
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
                        <div class="step cart">
                            <div class="icon"></div>
                            <span class="step-count">01</span>
                            <h3 class="step-name">Shopping Cart</h3>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="step checkout active">
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
            <div class="checkout-page">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form">
                            <h3 class="form-title">BILLING DETAILS</h3>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <label>LAST NAME <span class="required">*</span></label>
                                        <input type="text" value="{{ $data->name }}" name="name" disabled />
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <label>Email <span class="required">*</span></label>
                                        <input type="text" value="{{ $data->email }}" name="email" disabled />
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" value="{{ $data->phone }}" name="phone" disabled />
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" value="{{ $data->address }}" name="address" disabled />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (session('success_message'))
                        <script>
                            Swal.fire({
                                title: 'Thành công',
                                text: '{{ session('success_message') }}',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif
                    <div class="col-sm-12 col-md-6">
                        <h3 class="form-title">YOUR ODERS</h3>
                        <div class="order-review">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Product name</td>
                                        <td>Quantity</td>
                                        <td>Price</td>
                                        <td>Sub total</td>
                                    </tr>
                                    <?php $total = 0; ?>
                                    @foreach ($data_cart as $cart)
                                        <?php $sub_total = $cart->quantity * $cart->price; ?>
                                        <?php $total += $sub_total; ?>
                                        <tr>
                                            <td>{{ $cart->product_title }}</td>
                                            <td>{{ $cart->quantity }}</td>
                                            <td>{{ number_format($cart->price) }} VNĐ</td>
                                            <td><span class="amount">{{ number_format($sub_total) }} VNĐ</span></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">SHIPPING & HANDLING</td>
                                        <td>
                                            FREE SHIPPING
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ORDER TOTAL</td>
                                        <td>
                                            <span class="amount">{{ number_format($total) }} VNĐ</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="paymment-method">
                            <h3 class="form-title">PAYMENT METHOD</h3>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    SHIP TO BILLING ADDRESS ?
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    PAYPAL
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    I’VE READ AND ACCEPT THE TEMR & CONDITIONS
                                </label>
                            </div>
                        </div>
                        <a href="{{ url('cash_order') }}">
                            <button  class="button pull-right">PLACE ODER NOW</button>
                        </a>
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
