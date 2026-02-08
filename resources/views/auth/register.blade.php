<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/sg-vector.svg') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Auth Css-->
        <link href="{{ asset('assets/css/authpage.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        
    </head>

    <body class="auth-page">

        <div class="auth-card row g-0">
    <!-- Left Image -->
    <div class="col-lg-6 auth-left" style="background: url('https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;">
        <div class="auth-left-content">
            <div class="d-flex justify-content-between align-items-center">
                <div class="brand">NMU</div>
            </div>

            <h4>Capturing Moments,<br>Creating Memories</h4>
        </div>
    </div>

    <!-- Right Form -->
    <div class="col-lg-6 auth-right">
        <h2>Create an account</h2>
        <p class="text-muted">
            Already have an account?
            <a href="{{ route('login') }}">Log in</a>
        </p>

        <form class="mt-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input  class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
                </div>
            </div>

            <div class="mt-3">
                <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
            </div>

            <div class="mt-3">
                <input class="form-control" id="user_mobile" type="text" name="user_mobile" required="" placeholder="Phone number">
            </div>

            <div class="mt-3">
                <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
            </div>

            <div class="mt-3">
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">
            </div>

            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" id="terms">
                <label class="form-check-label text-muted" for="terms">
                    I agree to the <a href="#">Terms & Conditions</a>
                </label>
            </div>

            <button class="btn btn-primary w-100 mt-4" type="submit">Create account</button>

            <div class="text-center text-muted my-4">Or register with</div>

            <div class="row g-3">
                <div class="col-12">
                    <button type="button" class="btn btn-light w-100">
                        <i class="mdi mdi-google"></i>
                          Continue with Google
                    </button>
                </div>
            </div>
            <div class="text-center text-muted my-4">By Continue you agree to <a href="#">Term of Service. </a></div>
        </form>
    </div>
</div>
        
 

        

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
