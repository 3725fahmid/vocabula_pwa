<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

         <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

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
        <h2>Sign in to NMU</h2>
        <p class="text-muted">
            Welcome Back to NMU
        </p>

        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mt-3">
                <input class="form-control" id="username" name="identifier" type="text" required="" placeholder="Username or email">
            </div>

            <div class="mt-3">
                <input class="form-control" id="password" name="password" type="password" required="" placeholder="Password">
            </div>

            <div class="form-check mt-3 d-flex justify-content-between">
                <div>
                    <input class="form-check-input" name="remember" type="checkbox" id="terms">
                    <label class="form-check-label text-muted" for="terms">
                        Remember me
                    </label>
                </div>

                <label class="form-check-label text-muted text-right" for="terms">
                    <a href="{{ route('password.request') }}">Forget password</a>
                </label>
            </div>
            
            <button class="btn btn-primary w-100 mt-4" type="submit">Log In</button>


            <div class="text-center text-muted my-4">Or register with</div>

            <div class="row g-3">
                <div class="col-12">
                    <button type="button" class="btn btn-light w-100">
                        <i class="mdi mdi-google"></i>
                          Continue with Google
                    </button>
                </div>
            </div>
            <div class="text-center text-muted my-4">Don't have an account <a href="{{ route('register') }}">Sign up now. </a></div>
        </form>
    </div>
</div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

    </body>
</html>
