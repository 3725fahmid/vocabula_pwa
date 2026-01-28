@extends('layouts.app')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">

                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="text-center mb-4">
                            <img id="showImage"
                                 class="rounded-circle border mb-3"
                                 width="110"
                                 height="110"
                                 src="{{ (!empty($editData->profile_image))
                                    ? url('upload/user_images/'.$editData->profile_image)
                                    : url('upload/no_image.jpg') }}">

                            <div>
                                <label for="image" class="btn btn-outline-secondary btn-sm">
                                    Change Photo
                                </label>
                                <input type="file" id="image" name="profile_image" hidden>
                            </div>
                        </div>

                        <form method="post"
                              action="{{ route('store.profile') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ $editData->first_name }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ $editData->user_email }}">
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Username</label>
                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       value="{{ $editData->username }}">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
$(document).ready(function(){
    $('#image').change(function(e){
        const reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);
    });
});
</script>

@endsection
