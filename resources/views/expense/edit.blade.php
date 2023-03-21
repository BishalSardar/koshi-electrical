@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Expense</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('expense.update', $expense->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Description</label>
                                <input type="text" class="form-control" id="dm-ecom-product-name" name="description"
                                    value="{{ $expense->description }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Cost</label>
                                <input type="number" class="form-control" id="dm-ecom-product-name" name="cost"
                                    value="{{ $expense->cost }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-product-name">Date</label>
                                <input type="date" class="form-control" name="date" required
                                    value="{{ $expense->date }}">
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
