@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Customer</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-name">Name</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-phone-short">Phone</label>
                                <input class="form-control" id="dm-ecom-customer-phone-short" name="phone"
                                    pattern="98[0-9]{8}" rows="4"></input>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-address-short">Address</label>
                                <input class="form-control" id="dm-ecom-customer-address-short" name="address"
                                    rows="4"></input>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-alt-primary">Save</button>
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
