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
        <div class="col-md-4 offset-md-4 mt-5 pt-5">
            <div class="card1">
                <div class="card-body">
                    <h3 class="page-title">Forgot Your Password?</h3>
                    <p class="card-description">Neque porro quisquam est qui dolorem ipsum quia dolor sit
                        amet, consectetur, adipisci velit.. </p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="forms-sample" role="form" method="POST"
                        action="{{ url('/owner/password/email') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Email address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary me-2 w-100">Reset Password</button>
                        <br><br>
                        <div class="text-center">
                            <span>Know your password?<a href="{{ url('/owner/login') }}" style="color: #49654e">Login</a></span>
                        </div>
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
