<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" >
        
        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />        <!-- App favicon -->
        {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"> --}}
        <link rel="shortcut icon" href="{{ asset('assets/images/sg-vector.svg') }}">

        <script>
            (function() {
                const darkMode = localStorage.getItem('darkMode');
                if (darkMode === 'enabled') {
                    document.write(
                        '<link rel="stylesheet" href="{{ asset("assets/css/bootstrap-dark.min.css") }}" />' +
                        '<link rel="stylesheet" href="{{ asset("assets/css/app-dark.min.css") }}" />'
                    );
                } else {
                    document.write(
                        '<link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />' +
                        '<link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}" />'
                    );
                }
            })();
            </script>

        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- sweetalert2 --}}
        <!-- Sweet Alert-->
        <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
            

        @yield('cssLinks')
        <!-- custom Css-->
        <link href="{{ asset('assets/css/fh-custom.css') }}" rel="stylesheet" type="text/css" />

    </head>

    {{-- <body data-topbar="dark" data-sidebar="dark"> --}}
    <body data-topbar="dark">
    {{-- <body data-layout="vertical">  --}}

        <!-- Begin page -->
        <div id="layout-wrapper" style="margin-bottom: 80px">


          @include('partials.header')

            <!-- ========== Left Sidebar Start ========== -->
           @yield('left_side_bar')
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="container">

               @yield('admin')
                <!-- End Page-content -->

                {{-- @include('partials.footer') --}}


            </div>
            <!-- end main content-->

            @include('partials.mobileheader')

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">
            
                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Apearance</h6>

                <div class="mx-3 p-2">
                    <input type="checkbox" id="mode-switch">
                    <label class="form-check-label" for="mode-switch">Dark Mode</label>
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
       
        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- custom js:razib.dev -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

        <!-- Sweet alert init js-->
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
        <!-- toastr plugin -->
        <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>

        <!-- toastr init -->
        <script src="{{ asset('assets/js/pages/toastr.init.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js" ></script>
        
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('mode-switch');

    if (localStorage.getItem('darkMode') === 'enabled') {
        enableDarkMode();
        toggle.classList.add('active');
    }

    toggle.addEventListener('click', function () {
        const isDark = localStorage.getItem('darkMode') === 'enabled';

        if (isDark) {
            localStorage.setItem('darkMode', 'disabled');
        } else {
            localStorage.setItem('darkMode', 'enabled');
        }

        location.reload(); // keep your early-load behavior
    });

    function enableDarkMode() {
        loadStyle('bootstrap-dark', '{{ asset("assets/css/bootstrap-dark.min.css") }}');
        loadStyle('app-dark', '{{ asset("assets/css/app-dark.min.css") }}');
    }

    function loadStyle(id, href) {
        if (!document.getElementById(id)) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            link.id = id;
            document.head.appendChild(link);
        }
    }
});
</script>


@yield('scripts')

</body>
</html>
