@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Product</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="example-file-input">Product Image</label>
                                <input class="form-control" type="file" id="example-file-input" name="image">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Name</label>
                                <input type="text" class="form-control" id="dm-ecom-product-name" name="name">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-description-short">Product
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
