<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProduct;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Warranty_Guarantee;
use App\Models\WarrantyGuaranteeClaim;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class WarrantyGuaranteeClaimController extends Controller
{
    // index page
    public function warrantyGuaranteeClaimIndex()
    {
        return view('warranty_guarantee_claim.index');
    }


    // customer search page
    public function warrantyGuaranteeCustomerSearchPage(Request $request)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('warranty_guarantee_claim.customerSearch', compact('customers', 'products'));
    }

    public function warrantyGuaranteeCustomerSearchClaim(Request $request)
    {
        try {
            $warranty = Warranty_Guarantee::where('product_id', $request->product_id)->where('type', $request->type)->first();
            $customer_bill = CustomerBill::find($request->bill_id);
            $customer_bill_product = CustomerBillProduct::where('customerBill_id', $customer_bill->id)->where('product_id', $request->product_id)->get()->first();

            // $product = Stock::where('product_id', $request->product_id)->first();

            $warranty_guaranty = WarrantyGuaranteeClaim::where('customer_id', $request->customer_id)->where('bill_id', $request->bill_id)->where('product_id', $request->product_id)->latest()->first();
            // dd($warranty_guaranty);
            if (!$warranty_guaranty) {
                $customer_bill_date = Carbon::parse($customer_bill->invoice_date);
            } else {
                $customer_bill_date = $warranty_guaranty->invoice_date;
            }
            $newDate = $customer_bill_date->addMonths($warranty->time_period);
            $currentDate = Carbon::now();

            if ($newDate->lte($currentDate)) {
                dd('time period exceed');
            } else {
                if ($warranty) {
                    if ($request->quantity <= $customer_bill_product->quantity) {
                        $warranty_guarantee_claim = new WarrantyGuaranteeClaim();
                        $warranty_guarantee_claim->invoice_date = Carbon::now();
                        $warranty_guarantee_claim->customer_id = $request->customer_id;
                        $warranty_guarantee_claim->product_id = $request->product_id;
                        $warranty_guarantee_claim->quantity = $request->quantity;
                        $warranty_guarantee_claim->rate = $customer_bill_product->rate;
                        $warranty_guarantee_claim->unit = $customer_bill_product->unit;
                        $warranty_guarantee_claim->bill_id = $request->bill_id;
                        $warranty_guarantee_claim->amount = $request->quantity * $customer_bill_product->rate;
                        $warranty_guarantee_claim->save();
                        return redirect()->route('warranty.guarantee.claim.index')->with('success', 'Warranty Guarantee Claimed');
                    } else {
                        dd('quantity exceed');
                    }
                } else {
                    dd('warranty not found');
                }
            }
        } catch (Exception $exception) {
            dd($exception);
        }
        // $newDate = 

        // if()

        // if ($warranty) {
        //     if ($request->quantity <= $customer_bill_product->quantity) {
        //         dd('bishal');
        //     } else {
        //     }
        // } else {
        //     dd('warranty not found');
        // }
        // $customer = Customer::find($request->customer_id);
        // $customer_bill_product = CustomerBillProduct::where('customerBill_id', $customer_bill->id)->where('product_id', $request->product_id)->get()->first();

        // // dd($customer_bill_product);

        // if ($warranty) {
        //     return view('warranty_guarantee_claim.customerResult', compact('customer_bill_product', 'customer_bill', 'customer', 'warranty'));
        // } else {
        //     dd('error');
        // }
    }

    // regular customer search page
    public function warrantyGuaranteeRegularSearchPage(Request $request)
    {
        $products = Product::all();
        return view('warranty_guarantee_claim.regularSearch', compact('products'));
    }
}
