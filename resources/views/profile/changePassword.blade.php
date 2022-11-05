@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card card-bordered">
                <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <form id="signupForm" method="post" action="{{ route('admin.password.update') }}">
                        @csrf
                        <fieldset>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" class="form-control" name="current_password" type="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" class="form-control" name="new_password" type="password">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm password</label>
                                <input id="confirm_password" class="form-control" name="confirm_password" type="password">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Submit">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
