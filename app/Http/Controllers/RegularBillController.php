<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RegularBill;
use App\Models\RegularBillProducts;
use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;

class RegularBillController extends Controller
{
    //regular bill index page function
    public function regularBillIndex()
    {
        $regular_bills = RegularBill::all();
        $no_of_bills = count($regular_bills);
        return view('regular-customer-bill.index', compact('regular_bills', 'no_of_bills'));
    }

    // regular bill create page function
    public function regularBillCreate()
    {
        $products = Product::all();
        return view('regular-customer-bill.create', compact('products'));
    }
    

    // regular bill store function
    public function regularBillStore(Request $request)
    {
        try {
            $request->validate([
                'invoice_date' => 'required'
            ]);

            $regular_bill = new RegularBill();

            $regular_bill->customer_name = $request->customer_name;
            $regular_bill->invoice_date = $request->invoice_date;
            $regular_bill->gross_total_amount = $request->gross_total_amount;
            $regular_bill->discount = $request->discount;
            $regular_bill->net_total_amount = $request->net_total_amount;
            $regular_bill->remark = $request->remark;


            $regular_bill->save();

            for ($i = 0; $i < count($request->quantity); $i++) {
                $customer_bill_products = new RegularBillProducts();
                $customer_bill_products->regularBill_id = $regular_bill->id;
                $customer_bill_products->product_id = intval($request->product_id[$i]);
                $customer_bill_products->quantity = $request->quantity[$i];
                $customer_bill_products->rate = $request->basic_rate[$i];
                $customer_bill_products->unit = $request->unit[$i];
                $customer_bill_products->amount = $request->amount[$i];

                $inventory = Stock::find($request->product_id[$i]);
                if ($request->quantity[$i] > $inventory->stock) {
                    $saved_customer_bill = RegularBill::find($regular_bill->id);
                    $saved_customer_bill->delete();
                    return redirect()->back()->with('error', "Stock is not available");
                } else {
                    $inventory->stock = $inventory->stock - $request->quantity[$i];
                    $inventory->update();
                    $customer_bill_products->save();
                }
            }


            return redirect()->route('regularBill.index')->with('success', "Bill Created Successfully");
        } catch (Exception $exception) {
            return redirect()->route('regularBill.index')->with('error', $exception);
        }
    }


    // regular bill profile page
    public function regularBillProfile($id)
    {
        $regular_bill = RegularBill::find($id);
        $regular_bill_products = RegularBillProducts::where('regularBill_id', $id)->get();
        return view('regular-customer-bill.profile', compact('regular_bill', 'regular_bill_products'));
    }
    public function regularBillDelete($id)
    {
        $regular_bill = RegularBill::find($id);
        $regular_bill->delete();
        return redirect()->route('regularBill.index')->with('success', 'regular bill Deleted Successfully');
    }
}
