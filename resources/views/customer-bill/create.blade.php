@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add customer Bill</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ route('customerBill.store') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-3">
                                    <label class="form-label">Customer</label>
                                    <select class="js-select2 form-select" id="val-select2" name="customer_id" required
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="" disabled selected>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="form-label">Invoice Type</label>
                                    <select class="js-select2 form-select" id="val-select2" name="cr_or_dr" required
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="cr">Credit</option>
                                        <option value="dr">Debit</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="form-label">Invoice Date</label>
                                    <input type="date" class="form-control" name="invoice_date" required>
                                </div>
                                <div class="col-3">
                                    <label class="form-label">Status</label>
                                    <select class="js-select2 form-select" id="val-select2" name="status" required
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="" disabled selected>Select Type</option>
                                        <option value="unpaid">Unpaid</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table table-vcenter" id="tableEstimate">
                                <thead>
                                    <tr class="bg-body-dark">
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th style="width: 500px">Item Description</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Basic Rate</th>
                                        <th>Amount</th>
                                        <th class="text-center" style="width: 10px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td class="text-center" scope="row">1</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">25</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-alt-secondary"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <div class="row mb-4" style="margin-left: 0.5em">
                                <div class="text-center fw-semibold" style="width: 20px">#</div>
                                <div class="col-3" style="width: 500px">
                                    <select class="form-select" id="product_id">
                                        <option selected disabled value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                        {{-- <option value="1">Option #1</option> --}}
                                    </select>
                                </div>
                                <div class="col-2" style="width: 200px">
                                    <input type="number" class="form-control qty" id="quantity"
                                        placeholder="Enter Quantity">
                                </div>
                                <div class="col-2" style="width: 200px;">
                                    <select class="form-select" id="unit" name="example-select">
                                        <option selected disabled value="">Select Unit</option>
                                        <option value="pcs">Pcs</option>
                                        <option value="kg">KG</option>
                                        <option value="coil">Coil</option>
                                        <option value="meter">Meter</option>
                                        <option value="dozen">Dozen</option>
                                        <option value="pkt">Pkt</option>
                                    </select>
                                </div>
                                <div class="col-2" style="width: 200px">
                                    <input type="text" class="form-control prc" id="basic_rate" placeholder="Basic Rate">
                                </div>
                                <div class="col-1" style="width: 150px">
                                    <input type="text" class="form-control" id="amount" name="amount" value="0"
                                        disabled>
                                </div>
                                <div class="col-1" style="width: 40px;">
                                    <button type="button" class="btn btn-sm btn-alt-success" data-bs-toggle="tooltip"
                                        id="add-btn" title="Add">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div style="float:right;">

                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Gross Total</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" readonly id="gross_total_amount"
                                            value="0" name="gross_total_amount">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="discount" name="discount">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Net Total</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" readonly id="net_total_amount"
                                            name="net_total_amount" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="example-textarea-input" name="remark" rows="4" placeholder="Remark.."></textarea>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            {{-- <div class="mb-4">
                                <button type="submit" class="btn btn-primary submit-btn"
                                    style="float: right">Save</button>
                            </div> --}}
                        </form>
                        <!-- END Form Grid with Labels -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
