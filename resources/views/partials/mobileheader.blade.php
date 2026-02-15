  <header id="footer-bar" class="d-lg-none d-md-none d-inline-block">
    <div class="navbar-header d-flex item-center justify-evenly">


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
                </a>
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
                </a>
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
                </a>
            </div>
        </div>

        {{-- User Account  --}}
        @php
        $id = Auth::user()->id;
        $userData = App\Models\User::find($id);
        @endphp

        <div class="dropdown d-inline-block user-dropdown">
            <button type="button" class="btn header-item waves-effect mt-2" id="page-header-user-dropdown"
                data-bs-toggle="offcanvas"
                data-bs-target="#userBottomDrawer"
                aria-controls="userBottomDrawer">
                <img class="rounded-circle header-profile-user" src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg') }}"
                    alt="Header Avatar">
            </button>
            <div
                class="offcanvas offcanvas-bottom rounded-top"
                tabindex="-1"
                id="userBottomDrawer"
                aria-labelledby="userBottomDrawerLabel"
                style="height: auto;"
            >
                <!-- Header -->
                <div class="offcanvas-header border-bottom">
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ (!empty($userData->profile_image))? url('upload/user_images/'.$userData->profile_image):url('upload/no_image.jpg') }}"
                            class="rounded-circle"
                            width="48"
                            height="48"
                            alt="User">
                        <div>
                            <h6 class="mb-0 fw-semibold">{{ auth()->user()->first_name ?? 'User' }}</h6>
                            <small class="text-muted">{{ auth()->user()->user_email ?? '' }}</small>
                        </div>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>

                <!-- Body -->
                <div class="offcanvas-body p-0">
                    <div class="list-group list-group-flush">

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

                    <!-- Logout -->
                    <div class="p-3 border-top">
                        <a href="{{ route('logout') }}"
                        class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2">
                            <i class="ri-shut-down-line"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</header>
