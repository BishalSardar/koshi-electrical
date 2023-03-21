@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">

        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ route('expense.create') }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">
                            <i class="fa fa-plus"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Add Expense
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-dark mb-1">Rs. {{ $expenseAmount }}</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            All Expense
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
                    Expense
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter table-responsive js-dataTable-full">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Date</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                                <tr>
                                    <td class="fw-semibold">
                                        <strong>{{ $expense->description }}</strong>
                                    </td>
                                    <td class="fw-semibold">
                                        <span>{{ $expense->cost }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $expense->date }}</span>
                                    </td>
                                    <td class="text-center fs-sm">
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ route('expense.edit', $expense->id) }}">
                                            <i class="fa fa-fw fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('expense.delete', $expense->id) }}">
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
