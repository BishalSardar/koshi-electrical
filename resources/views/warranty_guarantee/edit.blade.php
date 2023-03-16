@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Warranty</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Product</label>
                                <select class="form-select" id="example-select" name="product_id">
                                    <option selected disabled>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Type</label>
                                <select class="form-select" id="example-select" name="type">
                                    <option selected disabled>Type</option>
                                    <option value="warranty">Warranty </option>
                                    <option value="guarantee">Guarantee </option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Issue By</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="issued_by">

                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Time Period</label>
                                <select class="form-select" id="example-select" name="time_period">
                                    <option selected disabled>Select Time Period</option>
                                    <option value="6">6 months </option>
                                    <option value="12">12 months </option>
                                    <option value="18">18 months </option>
                                    <option value="24">24 months </option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-description-short">Warrenty
                                    Description</label>
                                <textarea class="form-control" id="dm-ecom-product-description-short" name="description" rows="4"></textarea>
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
