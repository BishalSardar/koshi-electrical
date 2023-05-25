@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Quick Actions -->
        <div class="row items-push">
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('customer.edit', $customer->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">
                            <i class="fa fa-pencil-alt"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Edit Customer
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('customer.delete', $customer->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-danger mb-1">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                            Remove Customer
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Actions -->

        <!-- User Info -->
        <div class="block block-rounded">
            <div class="block-content text-center">
                {{-- <div class="py-4">
                    <h1 class="fs-lg mb-2">
                        {{ $customer->name }}
                    </h1>
                    <p class="text-muted mb-0">
                        <i class="fa fa-award text-warning me-1"></i>
                        {{ $customer->phone }}
                    </p>
                    <p class="text-muted">
                        <i class="fa fa-award text-warning me-1"></i>
                        {{ $customer->address }}
                    </p>
                </div> --}}
            </div>
            <div class="block-content bg-body-light text-center">
                <div class="row items-push text-uppercase">
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Bills</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">{{ $no_of_bills }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Cr/Dr</div>
                        @if ($customer->cr_or_dr == 'dr')
                            <div class="fs-3 text-success mb-1">Debit</div>
                        @else
                            <div class="fs-3 text-danger mb-1">Credit</div>
                        @endif
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Debit</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $customer->balance_amount }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Date</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">{{ $customer->created_at->format('Y-m-d') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END User Info -->

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Account</h3>
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

                        @foreach ($customer_bills as $bill)
                            <tr>
                                <td class="fw-semibold">
                                    <span> <a href="{{ route('customerBill.profile', $bill->id) }}">{{ $bill->id }}</a>
                                    </span>
                                </td>
                                <td>
                                    <span class="tb-lead">
                                        @foreach ($new_bill_details as $new_bill_detail)
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


    </div>
    <!-- END Page Content -->
@endsection
