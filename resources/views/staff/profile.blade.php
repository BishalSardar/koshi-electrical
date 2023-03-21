@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <!-- Page Content -->
    <div class="content">
        <!-- Quick Actions -->
        <div class="row items-push">
            <div class="col-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" data-bs-toggle="modal" href="#"
                    data-bs-target="#modal-default-vcenter">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">
                            <i class="fa fa-pencil-alt"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Add Salary
                        </p>
                    </div>
                </a>
            </div>
            <!-- Vertically Centered Default Modal -->
            <div class="modal" id="modal-default-vcenter" tabindex="-1" role="dialog"
                aria-labelledby="modal-default-vcenter" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Salary Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-1">
                            <p>Do you want to add Salary to {{ $staff->name }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-sm btn-primary"
                                href="{{ route('staff.salary', $staff->id) }}">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Vertically Centered Default Modal -->
            <div class="col-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('staff.borrow', $staff->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">
                            <i class="fa fa-pencil-alt"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Add Borrow Amount
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0"
                    href="{{ route('staff.edit', $staff->id) }}">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">
                            <i class="fa fa-pencil-alt"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Edit Staff
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" data-bs-toggle="modal"
                    href="#"data-bs-target="#modal-default-vcenter2">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-danger mb-1">
                            <i class="fa fa-times"></i>
                        </div>
                        <p class="fw-semibold fs-sm text-danger text-uppercase mb-0">
                            Remove Staff
                        </p>
                    </div>
                </a>
            </div>
            <!-- Vertically Centered Default Modal -->
            <div class="modal" id="modal-default-vcenter2" tabindex="-1" role="dialog"
                aria-labelledby="modal-default-vcenter2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Deletion Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-1">
                            <p>Do you want to delete {{ $staff->name }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-alt-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <a type="button" class="btn btn-sm btn-primary"
                                href="{{ route('staff.delete', $staff->id) }}">Yes</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Vertically Centered Default Modal -->
        </div>
        <!-- END Quick Actions -->

        <!-- User Info -->
        <div class="block block-rounded">
            <div class="block-content text-center">
                <div class="py-4">
                    <div class="mb-3">
                        <img class="img-avatar img-avatar96" src="{{ asset('admin/images/staff/' . $staff->image) }}"
                            alt="">
                    </div>
                    <h1 class="fs-lg mb-0">
                        {{ $staff->name }}
                    </h1>
                    <h4 class="fs-sm mb-0">
                        {{ $staff->address }}
                    </h4>
                    <h4 class="fs-sm mb-0">
                        {{ $staff->phone }}
                    </h4>
                    <h4 class="fs-sm mb-0">
                        {{ $staff->email_address }}
                    </h4>
                </div>
            </div>
            <div class="block-content bg-body-light text-center">
                <div class="row items-push text-uppercase">
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Total Earnings</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $staff->total_earning }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Salary</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $staff->salary }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Total Borrowed</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $staff->borrow_amount }}</a>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="fw-semibold text-dark mb-1">Current Month Salary</div>
                        <a class="link-fx fs-3" href="javascript:void(0)">Rs. {{ $staff->current_month_salary }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END User Info -->

        <!-- Past Orders -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Transactions</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-borderless table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="d-none d-sm-table-cell">Date</th>
                                <th class="d-none d-md-table-cell text-center">Amount</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffAccounts as $staffAccount)
                                <tr>
                                    <td class="d-none d-sm-table-cell fs-sm">{{ $staffAccount->invoice_date }}</td>
                                    <td class="fw-semibold text-center">{{ $staffAccount->amount }}</td>
                                    <td>
                                        @if ($staffAccount->type === 'borrow')
                                            <span class="badge bg-danger">Borrow</span>
                                        @else
                                            <span class="badge bg-success">Salary</span>
                                        @endif
                                    </td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Past Orders -->
    </div>
    <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection
