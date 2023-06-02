@extends('client.layout.app')
@section('content')
    <section class="banner banner-cart bg-parallax">
        <div class="overlay"></div>
        <div class="container">
            <div class="banner-content text-center">
                <h2 class="page-title">ORDER</h2>
                <div class="breadcrumbs">
                    <a href="#">Home</a>
                    <span>ORDER</span>
                </div>
            </div>
        </div>
    </section>
    <div class="maincontainer">
        <div class="container">
            <!-- Table cart -->
            <table class="shop_table cart">
                <thead>
                    <tr>
                        <th class="product-name">Product_name</th>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-price">Price</th>
                        <th class="product-subtotal">Payment Status</th>
                        <th class="product-subtotal">Delivery Status</th>
                        <th class="product-remove"></th>
                    </tr>
                </thead>
                <?php $total = 0 ?>
                <tbody>
                    <form action="{{url('/update_cart')}}" method="POST">
                        @csrf
                        @foreach ($order as $items)
                            <tr class="cart_item">
                                <td class="product-name">
                                    <h3 href="#">{{ $items->product_title }}</h3>
                                </td>
                                <td class="product-thumbnail">
                                    <div style="margin-left: 60px">
                                        <img src="/upload/{{ $items->image }}" style="width: 180px;height: 170px;" alt="" />
                                    </div>
                                </td>
                                <td class="product-quantity">
                                    <div >
                                        <input type="number" disabled value="{{$items->quantity}}"
                                        style="width: 50px;heigth:50px;border:1.5px solid black;border-radius:3px">
                                    </div>
                                </td>
                                <td class="product-price">
                                    <span class="amount">{{number_format($items->price)}} VNĐ</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{$items->payment_status}}</span>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{$items->delivery_status}}</span>
                                </td>
                                @if($items->delivery_status == 'Chờ xử lý')
                                <td class="product-remove">
                                    <a class="remove btn btn-success" onclick="return confirm('Are you sure to cancel the order?')"
                                           href="{{url('cancel',$items->id)}}">
                                        Huỷ đơn
                                    </a>
                                </td>
                                @else
                                <td class="product-remove">
                                    <span class="text-primary">Not allowed</span>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection
