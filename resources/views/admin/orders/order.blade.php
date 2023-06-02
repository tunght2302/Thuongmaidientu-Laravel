@extends('admin.layout.app')
@section('content')
        <div class="main-panel">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: red;text-align: center;font-size: 30px;font:bold">ALL ORDER</h4>
                        <div style="width: 300px;">
                            <form action="{{url('/search')}}" method="GET" style="display: flex">
                                <input type="text" class="form-control text-dark bg-light" name="search">
                                <button type="submit" class="btn btn-success mx-3">Submit</button>
                            </form>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table table-dark">
                                <thead class="bg-light" >
                                    <tr>
                                        <th class="text-dark" style=""> Name </th>
                                        <th class="text-dark"> Email </th>
                                        <th class="text-dark"> Address </th>
                                        <th class="text-dark"> Phone </th>
                                        <th class="text-dark"> Product_title </th>
                                        <th class="text-dark"> Image </th>
                                        <th class="text-dark"> Quantity </th>
                                        <th class="text-dark"> Price </th>
                                        <th class="text-dark"> Payment Status </th>
                                        <th class="text-dark"> Delivery Status </th>
                                        <th> Send Email </th>
                                    </tr>
                                </thead>
                                @forelse ($all_order as $order)
                                    
                                    <tbody>
                                        <tr>
                                            <td >{{ $order->name }} </td>
                                            <td>{{ $order->email }} </td>
                                            <td>{{ $order->address }} </td>
                                            <td>{{ $order->phone }} </td>
                                            <td>{{ $order->product_title }}</td>
                                            <td>
                                                <img style="width: 100px;height: 50px"
                                                    src="/upload/{{ $order->image }}">
                                            </td>
                                            <td>{{ $order->quantity }} </td>
                                            <td>{{ number_format($order->price) }} VNĐ</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <form action="{{url('delivered',$order->id)}}" method="POST">
                                                @csrf
                                                <td>
                                                    <select name="delivery_status" style="border-radius:5px;">
                                                        <option value="{{$order->delivery_status}}">{{$order->delivery_status}}</option>
                                                        <option value="Chờ xử lý">Chờ xử lý</option>
                                                        <option value="Đang xử lý">Đang xử lý</option>
                                                        <option value="Đang vận chuyển">Đang vận chuyển</option>
                                                        <option value="Đã giao">Đã giao</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-info">Update</button>
                                                </td>
                                            </form>
                                            <td>
                                                <a class="btn btn-success" href="{{url('send_email',$order->id)}}">Send Email</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @empty
                                    <div>
                                        <p class="text-danger">No Data Found</p>
                                    </div>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
@endsection
