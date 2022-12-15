@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Supplier</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-supplier-name">Name</label>
                                <input type="text" class="form-control" id="dm-ecom-supplier-name" name="name"
                                    value="{{ $supplier->name }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-supplier-phone-short">Phone</label>
                                <input class="form-control" id="dm-ecom-supplier-phone-short" name="phone"
                                    value="{{ $supplier->phone }}" pattern="98[0-9]{8}" rows="4"></input>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-supplier-address-short">Address</label>
                                <input class="form-control" id="dm-ecom-supplier-address-short" name="address"
                                    value="{{ $supplier->address }}" rows="4"></input>
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
