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
                        <div class="fs-3 fw-semibold text-dark mb-1">{{ $totalProduct }}</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            All Products
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
                                    <i class="far fa-user"></i>
                                </th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">
                                        @if ($product->image == null)
                                            <img src="{{ asset('admin/images/product/default-product.png') }}"
                                                class="img-avatar img-avatar48">
                                        @else
                                            <img src="{{ asset('admin/images/product/' . $product->image) }}"
                                                class="img-avatar img-avatar48">
                                        @endif
                                    </td>
                                    <td class="fw-semibold">
                                        <strong>{{ $product->name }}</strong>
                                    </td>
                                    <td class="fw-semibold">
                                        <span>{{ $product->Category['name'] }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $product->description }}</span>
                                    </td>
                                    <td class="text-center fs-sm">
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ route('product.edit', $product->id) }}">
                                            <i class="fa fa-fw fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('product.delete', $product->id) }}">
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
        <!-- END Dynamic Table Full -->
    @endsection
