  <header id="page-topbar" class="mx-4 rounded-3">
    <div class="navbar-header d-flex justify-between">

        <div class="d-flex">

            <!-- LOGO -->
            <div class="mx-3 px-3">
                <a href="{{ route('home') }}" class="logo logo-light">
                    {{-- <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-light-sm.svg') }}" alt="logo-sm-light" height="22">
                    </span> --}}
                    <span class="logo">
                        <img src="{{ asset('assets/images/logo-light.svg') }}" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form> --}}
        </div>

        <div class="d-none d-md-flex">

            <!-- Home Page Btn -->
            <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{route('home')}}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                            <i class="{{ Route::is('home') ? 'ri-home-4-fill' : 'ri-home-4-line' }}"></i>
                            <span class="small">
                                Home
                            </span>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Quize Page Btn -->
            <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{ url('quiz') }}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                            <i class="{{ request()->is('quiz') ? 'ri-keyboard-box-fill' : 'ri-keyboard-box-line' }}"></i>
                            <span class="small">
                                Quiz
                            </span>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Report Page Btn-->
            <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="#" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                            <i class="{{ request()->is('#') ? 'ri-bar-chart-box-fill' : 'ri-bar-chart-box-line' }}"></i>
                            <span class="small">
                                Report
                            </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="d-flex">
                {{-- Dark mode btn --}}
                {{-- <div class="dropdown d-inline-block ms-1">
                    <button type="button" class="btn header-item mt-2 noti-icon waves-effect">
                        <div class="checkbox-wrapper-54">
                            <label class="switch" for="mode-switch">
                                <input type="checkbox" id="mode-switch">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </button>
                </div> --}}
                {{-- Dark mode btn --}}
                    <div class="dropdown d-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon">
                            <div class="theme-flip" id="mode-switch">
                                <div class="flip-inner">
                                    <div class="flip-face flip-front">
                                        <i class="ri-sun-line"></i>
                                    </div>
                                    <div class="flip-face flip-back">
                                        <i class="ri-moon-line"></i>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>

            </div>

            @php
            if (!Auth::check()) {
                abort(404);
            } else {
                $id = Auth::user()->id;
                $userData = App\Models\User::find($id);
            }
            @endphp

            <div class="dropdown d-none d-md-inline-block d-lg-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg') }}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1">{{ $userData->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('change.password') }}"><i class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>
                    <a class="dropdown-item d-block" href="{{url('setting')}}"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                </div>
            </div>
        </div>

    </div>
</header>
