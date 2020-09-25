<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Panel - Reset Password</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('Backend/css/fontawesome.css') }}" rel="stylesheet">
        <link href="{{ asset('Backend/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('Backend/css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('Backend/css/style.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('Frontend/img/favicon.png') }}" sizes="32x32">
    </head>
    <body class="bg-gradient-info">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 ">
                    <div class="card-login card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-10 offset-1">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Reset Your Password</h1>
                                        </div>
                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf
                                            <div class="form-group col-12">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required>
                                                    @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                            </div>
                                            <button type="submit" class="col-10 offset-1 btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                            </button>
                                            <hr>
                                            <center><a href="{{ route('login') }}" class="col-12 text-danger"><i class="fas fa-arrow-circle-left"></i> Back To Login Page</a></center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts-->
        <script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('Backend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('Backend/js/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('Backend/js/app.js') }}" defer></script>
        <script src="{{ asset('Backend/js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
