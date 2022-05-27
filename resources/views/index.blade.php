<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quick Insurance Premium Financing">
    <meta name="author" content="Quick IPF">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Hospital Management System</title>
    <link href="{{ asset('public/login1/dist/css/style.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(public/login/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="{{ asset('public/uploads/logo/logo.jpg') }}" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Welcome to Hospital Management System</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success">Enter Credentials</div>

                            <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login')}}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="email" value="{{ old('email') }}" aria-describedby="basic-addon1" required autofocus>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" aria-label="Password" aria-describedby="basic-addon1" name="password" required  placeholder="{{__('Password')}}">
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Sign In</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('public/login/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/login/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/login/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();

    </script>
</body>

</html>