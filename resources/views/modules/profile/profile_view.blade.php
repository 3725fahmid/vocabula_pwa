@extends('layouts.app')
@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-7 col-md-9">

                {{-- Card --}}
                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        {{-- Avatar --}}
                        <div class="position-relative mb-3">
                            <img
                                class="rounded-circle border"
                                width="110"
                                height="110"
                                src="{{ (!empty($userData->profile_image))
                                    ? url('upload/user_images/'.$userData->profile_image)
                                    : url('upload/no_image.jpg') }}"
                                alt="Profile Image">
                        </div>

                        {{-- Name --}}
                        <h4 class="mb-0">{{ $userData->first_name }}</h4>

                        {{-- Username --}}
                        <div class="text-muted mb-4">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="url(#gradUser)" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                <defs>
                                    <linearGradient id="gradUser" x1="0" y1="0" x2="1" y2="1">
                                        <stop offset="0%" stop-color="#F59E0B"/>
                                        <stop offset="100%" stop-color="#EF4444"/>
                                    </linearGradient>
                                </defs>
                                <circle cx="12" cy="7" r="4" stroke="url(#gradUser)" stroke-width="2"/>
                                <path d="M4 21V19C4 16.7909 5.79086 15 8 15H16C18.2091 15 20 16.7909 20 19V21" stroke="url(#gradUser)" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            {{ '@'.$userData->username }}
                        </div>

                        {{-- Info List --}}
                        <ul class="list-group list-group-flush text-start mb-4">

                            {{-- Email --}}
                            <li class="list-group-item d-flex align-items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="gradEmail" x1="0" y1="0" x2="1" y2="1">
                                            <stop offset="0%" stop-color="#6366F1"/>
                                            <stop offset="100%" stop-color="#22C55E"/>
                                        </linearGradient>
                                    </defs>
                                    <path d="M2 4H22V20H2V4Z" stroke="url(#gradEmail)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M2 4L12 13L22 4" stroke="url(#gradEmail)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div class="ms-3">
                                    <div class="text-muted small">Email</div>
                                    <div class="fw-medium">{{ $userData->user_email }}</div>
                                </div>
                            </li>

                            {{-- Username --}}
                            <li class="list-group-item d-flex align-items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="gradUser2" x1="0" y1="0" x2="1" y2="1">
                                            <stop offset="0%" stop-color="#F59E0B"/>
                                            <stop offset="100%" stop-color="#EF4444"/>
                                        </linearGradient>
                                    </defs>
                                    <circle cx="12" cy="7" r="4" stroke="url(#gradUser2)" stroke-width="2"/>
                                    <path d="M4 21V19C4 16.7909 5.79086 15 8 15H16C18.2091 15 20 16.7909 20 19V21" stroke="url(#gradUser2)" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <div class="ms-3">
                                    <div class="text-muted small">Username</div>
                                    <div class="fw-medium">{{ $userData->username }}</div>
                                </div>
                            </li>

                        </ul>

                        {{-- Action --}}
                        <div class="d-grid">
                            <a href="{{ route('edit.profile') }}" class="btn btn-primary">
                                <svg width="16" height="16" class="me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <linearGradient id="gradEdit" x1="0" y1="0" x2="1" y2="1">
                                            <stop offset="0%" stop-color="#6366F1"/>
                                            <stop offset="100%" stop-color="#22C55E"/>
                                        </linearGradient>
                                    </defs>
                                    <path d="M12 20H21" stroke="url(#gradEdit)" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M16.5 3.5L20.5 7.5L7 21H3V17L16.5 3.5Z" stroke="url(#gradEdit)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Edit Profile
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

