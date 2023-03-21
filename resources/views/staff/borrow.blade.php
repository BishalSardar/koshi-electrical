@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-full content-boxed">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Staff Borrow</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8">
                        <form action="{{ route('staff.borrow.store', $staff->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-name">Name</label>
                                <input type="text" class="form-control" id="dm-ecom-customer-name" name="name"
                                    disabled value="{{ $staff->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="dm-ecom-customer-salary">Amount</label>
                                <input type="number" class="form-control" id="dm-ecom-customer-salary" name="amount"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="invoice_date" required>
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
