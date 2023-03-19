@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content content-boxed">
        <!-- Invoice -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">#{{ $warranty_guarantee_claim->id }}</h3>
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
                            @if (!$warranty_guarantee_claim->customer_id)
                                <p class="h3">{{ $warranty_guarantee_claim->regular_customer_name }}</p>
                            @else
                                <p class="h3">{{ $warranty_guarantee_claim->Customer['name'] }}</p>
                            @endif
                            <address>
                                @if (!$warranty_guarantee_claim->customer_id)
                                    {{-- nothing --}}
                                @else
                                    {{ $warranty_guarantee_claim->Customer['address'] }}<br>
                                    {{ $warranty_guarantee_claim->Customer['phone'] }}
                                @endif
                            </address>
                        </div>
                        <!-- END Company Info -->

                        <!-- Client Info -->
                        <div class="col-6 text-end">
                            <p class="h3">Invoice</p>
                            <address>
                                @php
                                    $dateString = $warranty_guarantee_claim->invoice_date;
                                    $timestamp = strtotime($dateString);
                                    $date = date('F jS, Y', $timestamp);
                                @endphp
                                {{ $date }}<br>
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
                                <tr>
                                    <td>
                                        <p class="fw-semibold mb-1">{{ $warranty_guarantee_claim->Product['name'] }}</p>
                                    </td>
                                    <td class="text-center">{{ $warranty_guarantee_claim->quantity }}</td>
                                    <td class="text-center">{{ $warranty_guarantee_claim->unit }}</td>
                                    <td class="text-end">Rs. {{ $warranty_guarantee_claim->rate }}</td>
                                    <td class="text-end">Rs. {{ $warranty_guarantee_claim->amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-uppercase text-end bg-body-light">
                                        Amount</td>
                                    <td class="fw-bold text-end bg-body-light">Rs. {{ $warranty_guarantee_claim->amount }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->

                    <!-- Footer -->
                    <p class="text-muted text-center my-5">
                        {{ $warranty_guarantee_claim->remark }}
                    </p>
                    <!-- END Footer -->
                </div>
            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->
@endsection
