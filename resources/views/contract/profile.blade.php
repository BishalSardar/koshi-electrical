@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-dark mb-1">
                            {{ count($contract_bills) }}
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Total Bills
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-danger text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-danger mb-1">{{ count($unpaid_contract_bills) }}</div>
                        <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                            Unpaid Bills
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">{{ count($paid_contract_bills) }}</div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Paid Bills
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">Rs. {{ $total_amount }} CR
                        </div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Total Amount
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Overview -->

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $contract->customer['name'] }}</h3>
                <div class="block-options">
                    <a href="{{ route('customerBill.create') }}">
                        <button type="button" class="btn btn-alt-success me-1 mb-3">
                            <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Add Bill
                        </button>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th style="width: 100px">Bill Id</th>
                            <th>Particular</th>
                            <th style="width: 200px">Date</th>
                            <th style="width: 200px">Status</th>
                            <th style="width: 200px">Cr/Dr Amount</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contract_bills as $bill)
                            <tr>
                                <td class="fw-semibold">
                                    <span> <a href="{{ route('customerBill.profile', $bill->id) }}">{{ $bill->id }}</a>
                                    </span>
                                </td>
                                <td>
                                    <span class="tb-lead">
                                        @foreach ($new_bill_details_filtered as $new_bill_detail)
                                            @php
                                                $bill_details = collect($new_bill_detail)->where('customerBill_id', $bill->id);
                                            @endphp
                                            @foreach ($bill_details as $item)
                                                @php
                                                    $products = DB::table('products')
                                                        ->where('id', $item->product_id)
                                                        ->first();
                                                @endphp
                                                <span><em class="icon ni ni-dot"></em>
                                                    {{ $products->name }}
                                                </span>
                                            @endforeach
                                        @endforeach
                                    </span>
                                </td>
                                <td>
                                    <span>{{ $bill->invoice_date }}</span>
                                </td>
                                <td>
                                    @if ($bill->status == 0)
                                        <span class="badge bg-danger">Unpaid</span>
                                    @else
                                        <span class="badge bg-success">Paid</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($bill->invoice_type === 'cr')
                                        <span class="text-success">Rs. {{ $bill->net_total_amount }} CR</span>
                                    @else
                                        <span class="text-danger">Rs. {{ $bill->net_total_amount }} DR</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Table -->

    </div>
@endsection
