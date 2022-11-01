<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kuafor</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('owner/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('owner/assets/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{asset('owner/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('owner/assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <div class="col-md-4 offset-md-4 mt-5 ">
            <div class="card1">
                <div class="card-body">
                    <h3 class="page-title">Register</h3>
                    <p class="card-description">Neque porro quisquam est qui dolorem ipsum quia dolor sit
                        amet, consectetur, adipisci velit.. </p>

                    <form class="forms-sample" role="form" method="POST" action="{{ url('/owner/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Business Name</label>
                            <input type="text" name="business_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1"> Phone Number</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>

                    </form>
                </div>
            </div>
            <!-- page-body-wrapper ends -->
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('owner/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('owner/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('owner/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('owner/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('owner/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('owner/assets/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('owner/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('owner/assets/js/todolist.js')}}"></script>
    <!-- End custom js for this page -->
</body>

</html>
