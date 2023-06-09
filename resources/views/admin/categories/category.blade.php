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
                        <h4 style="color: red;text-align: center;font-size: 30px;font:bold">ADD CATEGORY</h4>
                        <form class="forms-sample" action="{{ url('/add_category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input style="color: white" type="text" class="form-control" name="category"
                                    placeholder="NameCategory">
                            </div>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror <br>
                            <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            @if (session()->has('delete_category'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('delete_category') }}
                </div>
            @endif
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3 style="color: red;text-align: center;font-size: 30px;font:bold">LIST CATEGORY</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-danger"> ID </th>
                                        <th class="text-danger"> Name Category </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->category_name }}</td>

                                            <td>
                                                <a
                                                    class="btn btn-warning"href="{{ url('/update_category_view', $data->id) }}">
                                                    Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure to delete')"
                                                    href="{{ url('/delete_category', $data->id) }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
