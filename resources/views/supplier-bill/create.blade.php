@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Supplier Bill</h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-4">
                                    <label class="form-label">Invoice ID</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Invoice Date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Supplier</label>
                                    <select class="js-select2 form-select" id="val-select2" name="val-select2"
                                        style="width: 100%;" data-placeholder="Choose one..">
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                    </select>
                                </div>
                            </div>

                            <table class="table table-vcenter">
                                <thead>
                                    <tr class="bg-body-dark">
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th>Item Description</th>
                                        <th>Qty</th>
                                        <th>Unit</th>
                                        <th>Basic Rate</th>
                                        <th class="text-center" style="width: 20px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center" scope="row">1</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="fw-semibold">Danielle Jones</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-alt-secondary"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mb-4" style="margin-left: 0.5em">
                                <div class="text-center fw-semibold" style="width: 20px">#</div>
                                <div class="col-3">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-2" style="width: 300px">
                                    <input type="date" class="form-control">
                                </div>
                                <div class="col-2" style="width: 300px;">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-2" style="width: 300px">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-1" style="width: 90px; padding-left: 23px">
                                    <button type="button" class="btn btn-sm btn-alt-success" data-bs-toggle="tooltip"
                                        title="Add">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div style="float:right;">

                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Gross Total</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" disabled id="" name="">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="" name="">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label">Net Total</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" disabled id="" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="example-textarea-input" name="example-textarea-input" rows="4"
                                    placeholder="Remark.."></textarea>
                            </div>
                        </form>
                        <!-- END Form Grid with Labels -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
