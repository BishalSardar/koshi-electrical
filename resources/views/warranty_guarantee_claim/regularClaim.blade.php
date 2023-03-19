@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Claim Warranty</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('warranty.guarantee.regular.search.claim') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Customer</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="name">

                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Bill id</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="bill_id">
                            </div>
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
                                <label class="form-label" for="dm-ecom-product-quantity">Quantity</label>
                                <input type="number" class="form-control" id="dm-ecom-product-quantity" name="quantity">
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
                                <button type="submit" class="btn btn-alt-primary">Claim</button>
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
