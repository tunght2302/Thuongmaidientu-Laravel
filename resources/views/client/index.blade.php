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
    <div class="section-slide">
        @include('client.slide')
    </div>
    <div class="section-trend">
        @include('client.product1')
    </div>
    <section class="section-services-3 bg-parallax">
        @include('client.section')
    </section>
    <div class="section-trend">
        @include('client.product2')
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
