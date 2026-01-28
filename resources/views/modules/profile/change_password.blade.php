@extends('layouts.app')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">

                <div class="card shadow-lg p-4 mb-5 bg-body rounded">
                    <div class="card-body">

                        <h4 class="card-title mb-4 text-center">Change Password</h4>

                        {{-- Display Errors --}}
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show">
                                    {{ $error }}
                                </p>
                            @endforeach
                        @endif

                        {{-- Change Password Form --}}
                        <form method="post" action="{{ route('update.password') }}">
                            @csrf

                            {{-- Old Password --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Old Password</label>
                                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-white border-0">
                                        {{-- 3D Key Icon --}}
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <linearGradient id="gradOld" x1="0" y1="0" x2="1" y2="1">
                                                    <stop offset="0%" stop-color="#6366F1"/>
                                                    <stop offset="100%" stop-color="#22C55E"/>
                                                </linearGradient>
                                            </defs>
                                            <path d="M3 11V21H13V11H3Z" stroke="url(#gradOld)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13 11L21 3" stroke="url(#gradOld)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <input name="oldpassword" type="password" class="form-control border-0 px-3 py-2" placeholder="Enter old password">
                                </div>
                            </div>

                            {{-- New Password --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">New Password</label>
                                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-white border-0">
                                        {{-- 3D Lock Icon --}}
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <linearGradient id="gradNew" x1="0" y1="0" x2="1" y2="1">
                                                    <stop offset="0%" stop-color="#F59E0B"/>
                                                    <stop offset="100%" stop-color="#EF4444"/>
                                                </linearGradient>
                                            </defs>
                                            <rect x="6" y="11" width="12" height="10" stroke="url(#gradNew)" stroke-width="2"/>
                                            <path d="M9 11V7C9 4.79086 10.7909 3 13 3C15.2091 3 17 4.79086 17 7V11" stroke="url(#gradNew)" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                    <input name="newpassword" type="password" class="form-control border-0 px-3 py-2" placeholder="Enter new password">
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-5">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <div class="input-group shadow-sm rounded-pill overflow-hidden">
                                    <span class="input-group-text bg-white border-0">
                                        {{-- 3D Check Icon --}}
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <linearGradient id="gradConfirm" x1="0" y1="0" x2="1" y2="1">
                                                    <stop offset="0%" stop-color="#3B82F6"/>
                                                    <stop offset="100%" stop-color="#10B981"/>
                                                </linearGradient>
                                            </defs>
                                            <path d="M5 13L9 17L19 7" stroke="url(#gradConfirm)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                    <input name="confirm_password" type="password" class="form-control border-0 px-3 py-2" placeholder="Confirm new password">
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-md shadow-sm">
                                    Change Password
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
