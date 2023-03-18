@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Invoice -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">#1</h3>
                <div class="block-options">
                    <!-- Print Page functionality is initialized dmPrint() -->
                    <button type="button" class="btn-block-option" onclick="Dashmix.helpers('dm-print');">
                        <i class="si si-printer me-1"></i> Print Invoice
                    </button>
                </div>
            </div>
            <div class="block-content">
                <div class="p-sm-4 p-xl-7">
                    <!-- Invoice Info -->
                    <div class="row mb-4">
                        <!-- Company Info -->
                        <div class="col-6">
                            {{-- @php
                                $customer = DB::table('customers')
                                    ->where('id', $customer_bill->customer_id)
                                    ->first();
                            @endphp
                            <p class="h3">{{ $customer->name }}</p>
                            <address>
                                {{ $customer->address }}<br>
                                {{ $customer->phone }}
                            </address> --}}
                        </div>
                        <!-- END Company Info -->

                        <!-- Client Info -->
                        <div class="col-6 text-end">
                            <p class="h3">Invoice</p>
                            <address>
                                {{-- {{ $customer_bill->invoice_date }}<br>
                                {{ strtoupper($customer_bill->invoice_type) }}<br>
                                @if ($customer_bill->status == 0)
                                    <td>
                                        <span class="badge bg-danger">Unpaid</span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge bg-success">Paid</span>
                                    </td>
                                @endif --}}
                            </address>
                        </div>
                        <!-- END Client Info -->
                    </div>
                    <!-- END Invoice Info -->

                    <!-- Table -->
                    <div class="table-responsive push">
                        <table class="table table-bordered">
                            <thead class="bg-body">
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center" style="width: 90px;">Qnt</th>
                                    <th class="text-center" style="width: 60px;">Unit</th>
                                    <th class="text-end" style="width: 120px;">Rate</th>
                                    <th class="text-end" style="width: 120px;">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>
                                        <p class="fw-semibold mb-1">Logo Creation</p>
                                        <div class="text-muted">Logo and business cards design</div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge rounded-pill bg-primary">1</span>
                                    </td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$1.800,00</td>
                                    <td class="text-end">$1.800,00</td>
                                </tr>  --}}
                                {{-- @foreach ($customer_bill_products as $item)
                                    <tr>
                                        @php
                                            $products = DB::table('products')
                                                ->where('id', $item->product_id)
                                                ->first();
                                        @endphp
                                        <td>
                                            <p class="fw-semibold mb-1">{{ $products->name }}</p>
                                        </td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">{{ $item->unit }}</td>
                                        <td class="text-end">Rs. {{ $item->rate }}</td>
                                        <td class="text-end">Rs. {{ $item->amount }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="fw-semibold text-end">Gross Total Amount</td>
                                    <td class="text-end">Rs. {{ $customer_bill->gross_total_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-semibold text-end">Discount</td>
                                    <td class="text-end">Rs. {{ $customer_bill->discount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end bg-body-light">Net Total
                                        Amount</td>
                                    <td class="fw-bold text-end bg-body-light">Rs. {{ $customer_bill->net_total_amount }}
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->

                    <!-- Footer -->
                    <p class="text-muted text-center my-5">
                        {{ $customer_bill->remark }}
                    </p>
                    <!-- END Footer -->
                </div>
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
@endsection
