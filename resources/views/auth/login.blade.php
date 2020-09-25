<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Panel - Login</title>
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
        <link rel="icon" href="{{ asset('uploads/favicon.png') }}" sizes="32x32">
    </head>
    <body class="bg-gradient-info">
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-11 col-md-8">
                    <div class="card-login card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row" style="justify-content:center">
                                
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address .." required autofocus />
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="exampleInputPassword" placeholder="Enter Password .." required>
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                    @if (Route::has('password.request'))
                                                    <a class="text-dark" style="font-size: 12px;" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password ?') }}
                                                    </a>
                                                    @endif
                                            </div>
                                            <button type="submit" class="btn btn-info btn-user btn-block">
                                            Login
                                            </button>
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
