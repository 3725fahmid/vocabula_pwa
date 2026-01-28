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
                <button class="btn header-item d-flex align-items-center gap-2"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#userDrawer"
                        aria-controls="userDrawer">

                    <img class="rounded-circle header-profile-user"
                        src="{{ (!empty($userData->profile_image)) 
                                ? url('upload/user_images/'.$userData->profile_image) 
                                : url('upload/no_image.jpg') }}"
                        alt="Avatar"
                        width="36" height="36">
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="userDrawer">
                    <div class="offcanvas-header border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ (!empty($userData->profile_image)) 
                                        ? url('upload/user_images/'.$userData->profile_image) 
                                        : url('upload/no_image.jpg') }}"
                                class="rounded-circle"
                                width="48" height="48">

                            <div>
                                <h6 class="mb-0">{{ $userData->first_name }}</h6>
                                <small class="text-muted">{{ $userData->user_email ?? 'User Account' }}</small>
                            </div>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <div class="offcanvas-body p-0">
                        <div class="list-group list-group-flush user-menu">
                            <a href="{{ route('profile') }}" class="list-group-item">
                                <i class="ri-user-line me-2"></i> Profile
                            </a>

                            <a href="{{ route('change.password') }}" class="list-group-item">
                                <i class="ri-lock-password-line me-2"></i> Change Password
                            </a>

                            <a href="{{ url('setting') }}" class="list-group-item d-flex justify-content-between align-items-center">
                                <span>
                                    <i class="ri-settings-2-line me-2"></i> Settings
                                </span>
                                <span class="badge bg-success rounded-pill">11</span>
                            </a>

                            <a href="#" class="list-group-item">
                                <i class="ri-lock-unlock-line me-2"></i> Lock Screen
                            </a>
                        </div>
                    </div>

                    <div class="offcanvas-footer border-top p-3">
                        <a href="{{ route('logout') }}" class="btn btn-danger w-100">
                            <i class="ri-shut-down-line me-1"></i> Logout
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
