<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                            <h4 style="color: red;text-align: center;font-size: 30px;font:bold">UPDATE CATEGORY</h4>
                            <form class="forms-sample" action="{{ url('/update_category', $category->id) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input style="" type="text" class="form-control text-dark bg-light"
                                        name="category" placeholder="NameCategory"
                                        value="{{ $category->category_name }}">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                                <a class="btn btn-primary mr-2" href="{{ url('/view_category') }}">List Category</a>
                                <button class="btn btn-dark">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-scroller -->
        @include('admin.js')
</body>

</html>
