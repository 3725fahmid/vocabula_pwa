@extends('layouts.app')


@section('title')
    Setting
@endsection
 
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->
        <div class="row">
            <div class="col-12">
                <div class="card bg-dark text-light">
                    <div class="card-body d-flex justify-content-between">
                        <h5 class="mb-4 text-light"><i class="mdi mdi-theme-light-dark me-3"></i>Theme Customize</h5>
                        <div class="checkbox-wrapper-54">
                            <label class="switch" for="mode-switch">
                                <input type="checkbox" id="mode-switch">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>

</div> <!-- end:: Main Content -->
@endsection

@section('scripts')



@endsection
