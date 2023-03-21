@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">

        <!-- Quick Overview -->
        <div class="row items-push">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="{{ route('staff.create') }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">
                            <i class="fa fa-plus"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-success text-uppercase mb-0">
                            Add Staff
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-dark mb-1">{{ $staffCount }}</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            All Staffs
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
                    Staffs
                </h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter table-responsive js-dataTable-full">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Email Address</th>
                                <th style="width: 15%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td class="fw-semibold">
                                        <strong>{{ $staff->name }}</strong>
                                    </td>
                                    <td>
                                        <span>Rs.{{ $staff->salary }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $staff->phone }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $staff->address }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $staff->email_address }}</span>
                                    </td>

                                    <td class="text-center fs-sm">

                                        <a class="btn btn-sm btn-primary" href="{{ route('staff.profile', $staff->id) }}">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('staff.edit', $staff->id) }}">
                                            <i class="fa fa-fw fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" href="{{ route('staff.delete', $staff->id) }}">
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
