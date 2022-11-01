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
                    <h3 class="page-title">Login</h3>
                    <p class="card-description">Neque porro quisquam est qui dolorem ipsum quia dolor sit
                        amet, consectetur, adipisci velit.. </p>

                        <form class="forms-sample" role="form" method="POST" action="{{ url('/owner/login') }}">
                            {{ csrf_field() }}
    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Email address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="exampleInputPassword1">Password</label>
                            <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input"> Remember me <i
                                    class="input-helper"></i></label>
                        </div>
                        <button type="submit" class="btn btn-primary me-2 w-100">Sign In</button>
                        <br><br>
                        <div class="text-center">
                            <a href="{{ url('/owner/password/reset') }}" style="color: #49654e;">Forgot Password?</a><br><br>
                            <span>Don't have an account?<a href="{{ url('/owner/register') }}" style="color: #49654e">Create
                                    Profile</a></span>
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
