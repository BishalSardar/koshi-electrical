@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Quick Actions -->
        <div class="row items-push">
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('supplier.edit', $supplier->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">
                            <i class="fa fa-pencil-alt"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Edit Supplier
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('supplier.delete', $supplier->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-danger mb-1">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                            Remove Supplier
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Actions -->

        <!-- User Info -->
        <div class="block block-rounded">
            <div class="block-content text-center">
                <div class="py-4">
                    <h1 class="fs-lg mb-2">
                        {{ $supplier->name }}
                    </h1>
                    <p class="text-muted mb-0">
                        <i class="fa fa-award text-warning me-1"></i>
                        {{ $supplier->phone }}
                    </p>
                    <p class="text-muted">
                        <i class="fa fa-award text-warning me-1"></i>
                        {{ $supplier->address }}
                    </p>
                </div>
            </div>
            <div class="block-content bg-body-light text-center">
                <div class="row items-push text-uppercase">
                    <div class="col-6 col-md-4">
                        <div class="fw-semibold text-dark mb-1">No of Bills</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">{{ $no_of_bills }}</a>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="fw-semibold text-dark mb-1">Total Business Done</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $total_business_done }}</a>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="fw-semibold text-dark mb-1">Date</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">{{ $supplier->created_at->format('Y-m-d') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END User Info -->

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Customer Recent Bills</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter table-responsive js-dataTable-full">
                        <thead>
                            <tr>
                                <th>Bill ID</th>
                                <th>Bill Date</th>
                                <th>Discount</th>
                                <th>Net Total</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplier_bills as $supplier_bill)
                                <tr>
                                    <td class="fw-semibold">
                                        <strong>{{ $supplier_bill->id }}</strong>
                                    </td>
                                    <td>
                                        <span>{{ $supplier_bill->invoice_date }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $supplier_bill->discount }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $supplier_bill->net_total_amount }}</span>
                                    </td>
                                    <td class="text-center fs-sm">
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('supplier-bill.profile', $supplier_bill->id) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('supplier-bill.delete', $supplier_bill->id) }}">
                                            <i class="fa fa-fw fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- END Page Content -->
@endsection
