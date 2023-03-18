@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">

        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ route('product.create') }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">
                            <i class="fa fa-plus"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Add Product
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-dark mb-1">{{ $no_of_stocks }}</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            All Products
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">{{ $no_of_stocks_available }}</div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Available Stock
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-danger mb-1">{{ $no_of_stocks_out_of_stock }}</div>
                        <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                            Out of stock
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- END Quick Overview -->

        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Products
                </h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-alt-secondary" id="dropdown-ecom-filters"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filters <i class="fa fa-angle-down ms-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            New
                            <span class="badge bg-success rounded-pill">260</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            Out of Stock
                            <span class="badge bg-danger rounded-pill">63</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            All
                            <span class="badge bg-black-50 rounded-pill">36k</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter table-responsive js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;">
                                    ID
                                </th>
                                <th>Product</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Cost Value</th>
                                <th>Selling Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stocks as $stock)
                                <tr>
                                    <td class="text-center">
                                        @if ($stock->Product['image'] == null)
                                            <img src="{{ asset('admin/images/product/default-product.png') }}"
                                                class="img-avatar img-avatar48">
                                        @else
                                            <img src="{{ asset('admin/images/product/' . $stock->Product['image']) }}"
                                                class="img-avatar img-avatar48">
                                        @endif
                                    </td>
                                    <td class="fw-semibold">
                                        <strong>{{ $stock->Product['name'] }}</strong>
                                    </td>
                                    <td>
                                        <span>{{ $stock->stock }}</span>
                                    </td>
                                    @if ($stock->stock == 0)
                                        <td>
                                            <span class="badge bg-danger">Out of Stock</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                    @endif
                                    <td>
                                        <span>Rs. {{ $stock->cost_price }}</span>
                                    </td>
                                    <td>
                                        <span>Rs. {{ $stock->selling_price }}</span>
                                        <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#modal-block-vcenter" id="update-selling-price-btn"
                                            onclick="editSellingPrice({{ $stock->id }})" style="float: right;">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->

        <!-- Vertically Centered Default Modal -->
        <div class="modal" id="modal-default-vcenter" tabindex="-1" role="dialog" aria-labelledby="modal-default-vcenter"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Selling Value Update</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-validate is-alter" id="update-frm">
                            {{ csrf_field() }}
                            <div class="form-group mb-4">
                                <label class="form-label" for="full-name">Selling Value</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="selling-price" name="selling_price"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary" id="update-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Vertically Centered Default Modal -->
    </div>
@endsection
