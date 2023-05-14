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
                            <p>
                            required
                                <label>Country <span class="required">*</span></label>
                                <select>
                                    <option>United states</option>
                                    <option>Hanoi</option>
                                </select>
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <label>FIRST NAME <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <label>LAST NAME <span class="required">*</span></label>
                                        <input type="text" />
                                    </p>
                                </div>
                            </div>
                            <p>
                                <label>COMPANY NAME</label>
                                <input type="text" />
                            </p>
                            <p>
                                <label>ADDRESS <span class="required">*</span></label>
                                <select>
                                    <option>Street address</option>
                                    <option>No 1</option>
                                </select>
                            </p>
                            <p>
                                <input type="text" placeholder="Apartment, suite, unit etc (optional)" />
                            </p>
                            <p>
                                <label>TOWN / CITY <span class="required">*</span></label>
                                <select>
                                    <option>United states</option>
                                </select>
                            </p>
                            <p>
                                <label>POSTAL / ZIP CODE <span class="required">*</span></label>
                                <input type="text" />
                            </p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>
                                        <label>EMAIL ADDRESS <span class="required">*</span></label>
                                        <input type="email" />
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        <label>PHONE NUMBER <span class="required">*</span></label>
                                        <input type="email" />
                                    </p>
                                </div>
                            </div>
                            <div>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox1" value="option1"> CREATE AN ACCOUNT ?
                                </label>
                                <label class="checkbox-inline">
                                  <input type="checkbox" id="inlineCheckbox2" value="option2"> SHIP TO BILLING ADDRESS ?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h3 class="form-title">YOUR ODERS</h3>
                        <div class="order-review">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Product name</td>
                                        <td>Qty</td>
                                        <td>Sub total</td>
                                    </tr>
                                    <tr>
                                        <td>FLUSAS DEMIN DRESS</td>
                                        <td>01</td>
                                        <td><span class="amount">$252.56</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">CART SUBTOTAL</td>
                                        <td>
                                            <span class="amount">$252.56</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">SHIPPING & HANDLING</td>
                                        <td>
                                            FREE SHIPPINg
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ORDER TOTAL</td>
                                        <td>
                                            <span class="amount">$252.56</span>
                                            
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
                                <br />
                                <small>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</small>
                            </div>
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" value="">
                                CEQUE PAYMENT
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
                        <button class="button pull-right">PLACE ODER NOW</button>
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
