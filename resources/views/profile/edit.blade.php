@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> User Profile
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label">Your Profile</label>
                                <div class="push">
                                    @if (Auth::user()->profile_image == null)
                                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                                            src="{{ asset('admin/media/avatars/avatar10.jpg') }}" alt="">
                                    @else
                                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                                            src="{{ asset('admin/images/profile/' . Auth::user()->profile_image) }}"
                                            alt="">
                                    @endif
                                </div>
                                <label class="form-label" for="dm-profile-edit-avatar">Choose a new profile</label>
                                <input class="form-control" type="file" id="dm-profile-edit-avatar" name="image">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-name">Name</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name" name="name"
                                    placeholder="Enter your name.." value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-address"> Address</label>
                                <input type="" class="form-control" id="dm-profile-edit-address" name="address"
                                    placeholder="Enter your address.." value="{{ Auth::user()->address }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-profile-edit-job-phone">Phone</label>
                                <input type="text" class="form-control" id="dm-profile-edit-job-phone" name="phone"
                                    placeholder="Add your phone.." pattern="98[0-9]{8}" maxlength="10"
                                    value="{{ Auth::user()->phone }}">
                            </div>

                        </div>
                    </div>
                    <!-- END User Profile -->

                    <!-- Submit -->
                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END Submit -->
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
