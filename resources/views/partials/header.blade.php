  <header id="page-topbar" class="mx-2 mt-1 mt-md-0 rounded-pill shadow-lg">
    <div class="navbar-header d-flex justify-between">

        <div class="d-flex">

            <!-- LOGO -->
            <div class="mx-3 px-3">
                <a href="{{ route('home') }}" class="logo logo-light">
                    {{-- <span class="logo-sm">
                        <img src="{{ asset('assets/images/sobdogolpo.svg') }}" alt="logo-sm-light" height="22">
                    </span> --}}
                    <span class="logo">
                        <img src="{{ asset('assets/images/sobdogolpo.svg') }}" alt="logo-light" height="20">
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
                       <a href="{{ route('home') }}"
                            class="nav-link d-flex flex-column align-items-center
                            {{ Route::is('home') ? 'active text-primary fw-bold' : 'text-body text-white' }}"

                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            title="Home">

                            <i class="ri-home-4-{{ Route::is('home') ? 'fill' : 'line text-white' }} fs-3"></i>
                            <span class="small ">Home</span>
                        </a>
                    {{-- <a href="{{route('home')}}" class="waves-effect">
                        <button type="button"
                            class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center
                            {{ Route::is('home') ? 'text-primary active' : 'text-body' }}">

                            <i class="ri-home-4-{{ Route::is('home') ? 'fill' : 'line' }}"></i>

                            <span class="small">Home</span>
                        </button>
                    </a> --}}
                </div>
            </div>

            <!-- Quize Page Btn -->
            <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="{{ url('quiz') }}"
                            class="nav-link d-flex flex-column align-items-center
                            {{ request()->is('quiz') ? 'active text-primary fw-bold' : 'text-body text-white' }}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            title="Quiz">

                            <i class="ri-keyboard-box-{{ request()->is('quiz') ? 'fill' : 'line text-white' }} fs-3"></i>
                            <span class="small">Quiz</span>
                        </a>
                    {{-- <a href="{{ url('quiz') }}" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                            <i class="{{ request()->is('quiz') ? 'ri-keyboard-box-fill color-primary' : 'ri-keyboard-box-line' }}"></i>
                            <span class="small">
                                Quiz
                            </span>
                        </button>
                    </a> --}}
                </div>
            </div>

            <!-- Report Page Btn-->
            <div class="mx-lg-3 mx-1 mt-2 px-lg-3 px-1">
                <div class="dropdown d-lg-inline-block ms-1">
                    <a href="#"
                            class="nav-link d-flex flex-column align-items-center
                            {{ request()->is('#') ? 'active text-primary fw-bold' : 'text-body text-white' }}"
                             data-bs-toggle="tooltip"
                             data-bs-placement="bottom"
                             title="Report">

                            <i class="ri-bar-chart-box-{{ request()->is('#') ? 'fill' : 'line text-white' }} fs-3"></i>
                            <span class="small">Report</span>
                        </a>
                    {{-- <a href="#" class="waves-effect">
                        <button type="button" class="btn header-item noti-icon waves-effect d-flex flex-column align-items-center">
                            <i class="{{ request()->is('#') ? 'ri-bar-chart-box-fill color-primary' : 'ri-bar-chart-box-line' }}"></i>
                            <span class="small">
                                Report
                            </span>
                        </button>
                    </a> --}}
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

            <div class="dropdown d-none d-md-inline-block user-dropdown">

                <!-- Avatar Button -->
                <button class="btn header-item d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#userDrawer"
                        aria-controls="userDrawer">

                    <img class="rounded-circle header-profile-user"
                        src="{{ (!empty($userData->profile_image)) 
                                ? url('upload/user_images/'.$userData->profile_image) 
                                : url('upload/no_image.jpg') }}"
                        alt="Avatar"
                        width="36"
                        height="36">
                </button>

                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-end user-offcanvas"
                    tabindex="-1"
                    id="userDrawer"
                    aria-labelledby="userDrawerLabel">

                    <!-- Header -->
                    <div class="offcanvas-header border-bottom">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ (!empty($userData->profile_image)) 
                                        ? url('upload/user_images/'.$userData->profile_image) 
                                        : url('upload/no_image.jpg') }}"
                                class="rounded-circle"
                                width="48"
                                height="48">

                            <div>
                                <h6 class="mb-0">{{ $userData->first_name }}</h6>
                                <small class="text-muted">{{ $userData->user_email ?? 'User Account' }}</small>
                            </div>
                        </div>

                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>

                    <!-- Body -->
                    <div class="offcanvas-body p-0">
                        <div class="list-group list-group-flush user-menu">

                            <a href="{{ route('profile') }}" 
                            class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                                <i class="ri-user-line fs-5 text-primary"></i>
                                <span>Profile</span>
                            </a>

                            <a href="{{ route('change.password') }}" 
                            class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                                <i class="ri-lock-password-line fs-5 text-warning"></i>
                                <span>Change Password</span>
                            </a>

                            <a href="{{ url('setting') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                                <i class="ri-settings-2-line fs-5 text-success"></i>
                                <span>Settings</span>
                            </a>

                            <a href="#" 
                            class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                                <i class="ri-lock-unlock-line fs-5 text-secondary"></i>
                                <span>Lock Screen</span>
                            </a>

                        </div>
                    </div>

                    <!-- Footer -->
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
