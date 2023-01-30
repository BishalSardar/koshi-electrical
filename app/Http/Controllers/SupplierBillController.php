<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\SupplierBill;
use App\Models\SupplierBillProduct;
use Exception;
use Illuminate\Http\Request;

class SupplierBillController extends Controller
{
    // supplier-bill index route page function 
    public function supplierBillIndex()
    {
        $supplier_bills = SupplierBill::all();
        return view('supplier-bill.index', compact('supplier_bills'));
    }

    // supplier-bill create page route function
    public function supplierBillCreate()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('supplier-bill.create', compact('products', 'suppliers'));
    }

    // supplier-bill store function 
    public function supplierBillStore(Request $request)
    {
        try {
            $request->validate([
                'invoice_id' => 'required',
                'invoice_date' => 'required',
                'supplier_id' => 'required',
            ]);

            $supplier_bill = new SupplierBill();

            $supplier_bill->supplier_id = $request->supplier_id;
            $supplier_bill->invoice_id = $request->invoice_id;
            $supplier_bill->invoice_date = $request->invoice_date;
            $supplier_bill->gross_total_amount = $request->gross_total_amount;
            $supplier_bill->discount = $request->discount;
            $supplier_bill->net_total_amount = $request->net_total_amount;
            $supplier_bill->remark = $request->remark;

            $supplier_bill->save();

            for ($i = 0; $i < count($request->quantity); $i++) {
                $supplier_bill_product = new SupplierBillProduct();
                $supplier_bill_product->supplierBill_id = $supplier_bill->id;
                $supplier_bill_product->product_id = intval($request->product_id[$i]);
                $supplier_bill_product->quantity = $request->quantity[$i];
                $supplier_bill_product->rate = $request->basic_rate[$i];
                $supplier_bill_product->unit = $request->unit[$i];
                $supplier_bill_product->amount = $request->amount[$i];

                $supplier_bill_product->save();
            }

            for ($i = 0; $i < count($request->product_id); $i++) {

                $id = intval($request->product_id[$i]);
                $inventory = Stock::find($id);
                $inventory->cost_price = $request->basic_rate[$i];
                $inventory->stock += $request->quantity[$i];
                $inventory->update();
            }
            return redirect()->route('supplier-bill.index')->with('success', "Supplier Bill Created Successfully");
        } catch (Exception $exception) {
            return redirect()->route('supplier-bill.index')->with('error', "Error while creating supplier bill");
        }
    }


    // supplier bill page function
    public function supplierBillProfile($id)
    {
        $supplier_bill = SupplierBill::find($id);
        // $factory_bill_products = FactoryBillProduct::where('factoryBill_id', $id)->get();
        $supplier_bill_products = SupplierBillProduct::where('supplierBill_id', $id)->get();
        return view('supplier-bill.profile', compact('supplier_bill', 'supplier_bill_products'));
    }


    public function supplierBillDelete($id)
    {
        $supplier_bill =  SupplierBill::find($id);
        $supplier_bill->delete();
        return redirect()->back()->with('success', "Supplier Bill Created Successfully");
    }
}
