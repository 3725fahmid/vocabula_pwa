@extends('layouts.app')

@section('title', 'Settings')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col">
                <h4 class="mb-0">Settings</h4>
                <small class="text-muted">Manage your preferences and account</small>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <!-- Appearance -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">Appearance</h6>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            {{-- <span>Theme</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mode-switch">
                            </div> --}}
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>Font Size</span>
                            <select class="form-select form-select-sm w-auto">
                                <option>Small</option>
                                <option selected>Medium</option>
                                <option>Large</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span>Reading Width</span>
                            <select class="form-select form-select-sm w-auto">
                                <option selected>Normal</option>
                                <option>Wide</option>
                            </select>
                        </div>
                    </div>
                </div>


                <!-- Account -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">Account</h6>

                        <div class="list-group list-group-flush">
                            <a href="{{ route('profile') }}" class="list-group-item px-0">
                                Edit Profile
                            </a>
                            <a href="{{ route('change.password') }}" class="list-group-item px-0">
                                Change Password
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">Security</h6>

                        <a href="{{ route('logout') }}"
                           class="btn btn-outline-danger w-100">
                            Logout
                        </a>
                    </div>
                </div>

                <!-- Legal & Info -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">Legal & Info</h6>

                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item px-0">
                                Privacy Policy
                            </a>
                            <a href="#" class="list-group-item px-0">
                                Terms & Conditions
                            </a>
                            <a href="#" class="list-group-item px-0">
                                About
                            </a>
                            <a href="#" class="list-group-item px-0">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center text-muted small mt-4">
                    {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} · PHP v{{ PHP_VERSION }}<br> --}}
                    <a href="#" class="text-muted me-2">Privacy Policy</a>
                    <a href="#" class="text-muted me-2">Terms</a>
                    <a href="#" class="text-muted">About</a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
