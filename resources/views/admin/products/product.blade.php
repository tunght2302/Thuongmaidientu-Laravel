@extends('admin.layout.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 style="color: red;text-align: center;font-size: 30px;font:bold">ADD PRODUCT</h4>
                        <form class="forms-sample" action="{{ url('/add_product') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control bg-light text-dark" name="title"
                                    placeholder="Title">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Description</label>
                                <input type="text" class="form-control bg-light text-dark" name="description"
                                    placeholder="description">
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Quantity</label>
                                <input type="number" min="0" name="quantity" class="form-control bg-light text-dark"
                                    placeholder="Quantity">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Price</label>
                                <input type="number" name="price" class="form-control bg-light text-dark"
                                    placeholder="Price">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Category</label>
                                <select class="form-control bg-light text-dark" name="category" id="exampleSelectGender">
                                    @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror <br>
                            <div class="form-group">
                                <label for="exampleInputCity1">Discount_price</label>
                                <input type="text" name="dis_price" class="form-control bg-light text-dark"
                                    placeholder="Discount_price">
                                @error('dis_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror <br>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a class="btn btn-danger mr-2" href="{{ url('/list_product') }}">List Product</a>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
@endsection
