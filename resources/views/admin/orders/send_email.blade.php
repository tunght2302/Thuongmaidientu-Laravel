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
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="color: red;text-align: center;font-size: 30px;font:bold">SEND EMAIL TO:
                                 <p class="text-primary" style="font-size: 18px">{{$send_email->email}}</p>
                            </h4>
                            <form class="forms-sample" action="{{url('send_email_user',$send_email->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-warning">Email Greeting:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email Greeting" name="greeting">
                                </div>
                                <div class="form-group">
                                    <label class="text-warning">Email FirstLing:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email FirstLing" name="firstline">
                                </div>
                                <div class="form-group">
                                    <label class="text-warning">Email Body:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email Body" name="body">
                                </div>
                                <div class="form-group">
                                    <label class="text-warning">Email Button Name:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email Button Name" name="button">
                                </div>
                                <div class="form-group">
                                    <label class="text-warning">Email Url:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email Url" name="url">
                                </div>
                                <div class="form-group">
                                    <label class="text-warning">Email Last Line:</label>
                                    <input style="background-color: white" type="text" class="form-control text-dark"
                                        placeholder="Email Last Line" name="lastline">
                                </div>

                                <button type="submit" class="btn btn-success  mr-2">Submit</button>
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
