<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Recover Password </title>
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

        <!-- Auth Css-->
        <link href="{{ asset('assets/css/authpage.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        
    </head>

    <body class="auth-page">

        <div class="auth-card row g-0">

    <!-- Right Form -->
    <div class="auth-right">
        <h2 class="text-center"><b>Reset Password</b></h2>


        <form class="mt-4"  method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="alert alert-info alert-dismissible fade show" role="alert">
     Forgot your password?<strong> No problem.</strong> Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
            <div class="mt-3">
                <input class="form-control" id="email" type="email" name="email"  required="" placeholder="Email">
            </div>           
            <button class="btn btn-primary w-100 mt-4" type="submit">Log In</button>
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

    </body>
</html>
