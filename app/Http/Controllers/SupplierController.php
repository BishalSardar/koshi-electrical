<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierBill;
use Exception;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // supplier index function
    public function supplierIndex()
    {
        $suppliers = Supplier::all();
        $totalSupplier = Supplier::count();
        return view('supplier.index', compact('suppliers', 'totalSupplier'));
    }

    // supplier create page function
    public function supplierCreate()
    {
        return view('supplier.create');
    }

    //supplier store function
    public function supplierStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $supplier = new supplier();

            $supplier->name = $request->name;
            $supplier->address = $request->address;
            $supplier->phone = $request->phone;
            $supplier->save();
            return redirect()->route('supplier.index')->with('success', "Supplier Added Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Supplier');
        }
    }

    // factory edit page function
    public function supplierEdit($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit', compact('supplier'));
    }

    // supplier update function
    public function supplierUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $supplier = Supplier::find($id);

            $supplier->name = $request->name;
            $supplier->phone = $request->phone;
            $supplier->address = $request->address;
            $supplier->update();
            return redirect()->route('supplier.index')->with('success', "Supplier Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Updating Supplier');
        }
    }

    // supplier delete function 
    public function supplierDelete($id)
    {
        $supplier = supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('success', "Supplier Deleted Successfully");
    }

    // customer profile function
    public function supplierProfile($id)
    {
        $supplier = Supplier::find($id);
        $no_of_bills = SupplierBill::where('supplier_id', $supplier->id)->count();
        $total_business_done = SupplierBill::where('supplier_id', $supplier->id)->sum('net_total_amount');

        $supplier_bills = SupplierBill::where('supplier_id', $supplier->id)->get();


        return view('supplier.profile', compact('supplier', 'no_of_bills', 'total_business_done', 'supplier_bills'));
    }
}
