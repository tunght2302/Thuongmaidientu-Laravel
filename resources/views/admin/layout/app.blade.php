<!DOCTYPE html>
<html lang="en">
  <head>
        @include('admin.layout.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.layout.sidebar')
      <!-- partial -->
        @include('admin.layout.header')
        <!-- partial -->
        @yield('content')
    <!-- container-scroller -->
        @include('admin.layout.js')
  </body>
</html>