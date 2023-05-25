@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Staff</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Profile Image</label>
                                <input class="form-control" type="file" id="example-file-input"
                                    accept=".jpg') }}, .png') }}, image/jpeg, image/png" name="image">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-name">Name</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="name"
                                    value="{{ $staff->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-salary">Salary</label>
                                <input type="number" class="form-control" id="dm-ecom-customer-salary" name="salary"
                                    value="{{ $staff->salary }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-address">Address</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-address" name="address"
                                    value="{{ $staff->address }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-phone-short">Phone</label>
                                <input class="form-control" id="dm-ecom-customer-phone-short" name="phone"
                                    value="{{ $staff->phone }}" pattern="98[0-9]{8}" rows="4"></input>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-address-short">Email Address</label>
                                <input type="email" class="form-control" id="dm-ecom-customer-address-short"
                                    value="{{ $staff->email_address }}" name="email_address" rows="4"
                                    required></input>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Info -->

    </div>
    <!-- END Page Content -->
@endsection
