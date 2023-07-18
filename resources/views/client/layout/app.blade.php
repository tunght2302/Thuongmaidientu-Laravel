<!DOCTYPE html>
<html lang="en">
    
<head>
    @include('client.layout.css')
</head>

<body class="home">
    <header class="header header-style3">
        @include('client.layout.header')
    </header>
    @yield('content')
    <div class="section-shopbrand section-shopbrand3 bg-parallax">
        @include('client.layout.shop-brand')
    </div>
    <footer class="footer">
        @include('client.layout.footer')
    </footer>
    @include('client.layout.js')
</body>

</html>
