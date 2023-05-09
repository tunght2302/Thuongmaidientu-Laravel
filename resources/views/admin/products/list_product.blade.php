<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: red;text-align: center;font-size: 30px;font:bold">LIST PRODUCT</h4>
                        </p>
                        <div class="table-responsive mt-3">
                            <table class="table table-dark">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-dark"> ID </th>
                                        <th class="text-dark"> Title </th>
                                        <th class="text-dark"> Description </th>
                                        <th class="text-dark"> Category </th>
                                        <th class="text-dark"> Image </th>
                                        <th class="text-dark"> Price </th>
                                        <th class="text-dark"> Quantity </th>
                                        <th class="text-dark"> Discount_price </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td> {{ $product->id }} </td>
                                            <td> {{ $product->title }} </td>
                                            <td> {{ $product->description }} </td>
                                            <td> {{ $product->category }} </td>
                                            <td>
                                                <img style="width: 130px;height: 100px"
                                                    src="/upload/{{ $product->image }}">
                                            </td>
                                            <td> {{ $product->price }} </td>
                                            <td> {{ $product->quantity }} </td>
                                            <td> {{ $product->discount_price }} </td>
                                            <td>
                                                <button class="btn btn-info">Edit</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-warning">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a class="btn btn-success mt-3" href="{{ url('/view_product') }}">Add Product</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
    </div>
    @include('admin.js')
</body>

</html>
