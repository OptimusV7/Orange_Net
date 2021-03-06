<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{env('APP_NAME')}} - SignUp</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('favicon.png')}}">
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/x-icon">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9360848754738617"
            crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">

    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-end align-items-center">
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                </div>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                                <a class="auth-brand text-center d-block mb-20" href="{{url('/')}}" style="color: #32cd32">
                                    {{env('APP_NAME')}}
                                </a>
                                <form id="reg_form" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <h1 class="display-4 mb-10 text-center">Sign up for free</h1>
                                    <p class="mb-30 text-center">Create your account </p>
                                    <div class="form-group">
                                        <input id="name" type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                        <input id="login_password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <span class="input-group-btn" id="eye_Slash">
                                               <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                             </span>
                                        <span class="input-group-btn" id="eye_Show" style="display: none;">
                                               <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                             </span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            <span class="input-group-btn" id="eyeSlash">
                                               <button class="btn btn-default reveal" onclick="visibility4()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
                                             </span>
                                            <span class="input-group-btn" id="eyeShow" style="display: none;">
                                               <button class="btn btn-default reveal" onclick="visibility4()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                             </span>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-25">
                                        <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                        <label class="custom-control-label font-14" for="same-address">I have read and agree to the <a href=""><u>term and conditions</u></a></label>
                                    </div>
                                    <button class="g-recaptcha btn btn-primary btn-block" data-sitekey={{env('RECAPTURE')}}
                                            data-callback='onSubmit' data-action='submit' type="submit">Register</button>


                                    <p class="text-center">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Toggles JavaScript -->
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>

    <script>
        function visibility3() {
            var x = document.getElementById('login_password');
            if (x.type === 'password') {
                x.type = "text";
                $('#eyeShow').show();
                $('#eyeSlash').hide();
            }else {
                x.type = "password";
                $('#eyeShow').hide();
                $('#eyeSlash').show();
            }
        }
    </script>

    <script>
        function visibility4() {
            var x = document.getElementById('password-confirm');
            if (x.type === 'password') {
                x.type = "text";
                $('#eye_Show').show();
                $('#eye_Slash').hide();
            }else {
                x.type = "password";
                $('#eye_Show').hide();
                $('#eye_Slash').show();
            }
        }
    </script>

    <script>
        function onSubmit(token) {
            document.getElementById("reg_form").submit();
        }
    </script>
</body>

</html>
