<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierBillController extends Controller
{
    // supplier-bill index route page function 
    public function supplierBillIndex()
    {
        return view('supplier-bill.index');
    }

    public function supplierBillCreate()
    {
        return view('supplier-bill.create');
    }
}
