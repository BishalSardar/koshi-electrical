<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProduct;
use App\Models\Product;
use App\Models\RegularBill;
use App\Models\RegularBillProducts;
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
        $warranty_guaranty_claims = WarrantyGuaranteeClaim::all();
        $count = WarrantyGuaranteeClaim::count();
        return view('warranty_guarantee_claim.index', compact('warranty_guaranty_claims', 'count'));
    }


    // customer search page
    public function warrantyGuaranteeCustomerSearchPage(Request $request)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('warranty_guarantee_claim.customerClaim', compact('customers', 'products'));
    }

    public function warrantyGuaranteeCustomerSearchClaim(Request $request)
    {
        try {
            $warranty = Warranty_Guarantee::where('product_id', $request->product_id)->where('type', $request->type)->first();
            $customer_bill = CustomerBill::find($request->bill_id);
            $customer_bill_product = CustomerBillProduct::where('customerBill_id', $customer_bill->id)->where('product_id', $request->product_id)->get()->first();

            $warranty_guaranty = WarrantyGuaranteeClaim::where('customer_id', $request->customer_id)->where('bill_id', $request->bill_id)->where('product_id', $request->product_id)->latest()->first();
            if (!$warranty_guaranty) {
                $customer_bill_date = Carbon::parse($customer_bill->invoice_date);
            } else {
                $customer_bill_date = Carbon::parse($warranty_guaranty->invoice_date);
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
                        return redirect()->back()->with('error', 'Quantity exceed');
                    }
                } else {
                    return redirect()->back()->with('error', 'Warranty or Guarantee not found');
                }
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Warranty/Guarantee');
        }
    }



    public function warrantyGuaranteeClaimProfile($id)
    {
        $warranty_guarantee_claim = WarrantyGuaranteeClaim::find($id);
        return view('warranty_guarantee_claim.claimProfile', compact('warranty_guarantee_claim'));
    }




    // regular customer search page
    public function warrantyGuaranteeRegularSearchPage(Request $request)
    {
        $products = Product::all();
        return view('warranty_guarantee_claim.regularClaim', compact('products'));
    }





    public function warrantyGuaranteeRegularSearchClaim(Request $request)
    {
        // dd($request->all());
        try {
            $warranty = Warranty_Guarantee::where('product_id', $request->product_id)->where('type', $request->type)->first();
            $regular_bill = RegularBill::find($request->bill_id);
            $regular_bill_product = RegularBillProducts::where('regularBill_id', $regular_bill->id)->where('product_id', $request->product_id)->get()->first();

            $warranty_guaranty = WarrantyGuaranteeClaim::where('customer_id', $request->name)->where('bill_id', $request->bill_id)->where('product_id', $request->product_id)->latest()->first();
            if (!$warranty_guaranty) {
                $regular_bill_date = Carbon::parse($regular_bill->invoice_date);
            } else {
                $regular_bill_date = Carbon::parse($warranty_guaranty->invoice_date);
            }
            $newDate = $regular_bill_date->addMonths($warranty->time_period);
            $currentDate = Carbon::now();

            if ($newDate->lte($currentDate)) {
                dd('time period exceed');
            } else {
                if ($warranty) {
                    if ($request->quantity <= $regular_bill_product->quantity) {
                        $warranty_guarantee_claim = new WarrantyGuaranteeClaim();
                        $warranty_guarantee_claim->invoice_date = Carbon::now();
                        $warranty_guarantee_claim->regular_customer_name = $request->name;
                        $warranty_guarantee_claim->product_id = $request->product_id;
                        $warranty_guarantee_claim->quantity = $request->quantity;
                        $warranty_guarantee_claim->rate = $regular_bill_product->rate;
                        $warranty_guarantee_claim->unit = $regular_bill_product->unit;
                        $warranty_guarantee_claim->bill_id = $request->bill_id;
                        $warranty_guarantee_claim->amount = $request->quantity * $regular_bill_product->rate;
                        $warranty_guarantee_claim->save();
                        return redirect()->route('warranty.guarantee.claim.index')->with('success', 'Warranty Guarantee Claimed');
                    } else {
                        return redirect()->back()->with('error', 'Quantity exceed');
                    }
                } else {
                    return redirect()->back()->with('error', 'Warranty or Guarantee not found');
                }
            }
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'Error While Adding Warranty/Guarantee');
        }
    }



    // warranty-guarantee delete function 
    public function warrantyGuaranteeClaimDelete($id)
    {
        $warranty_guarantee_claim = WarrantyGuaranteeClaim::find($id);
        $warranty_guarantee_claim->delete();
        return redirect()->back()->with('success', 'Warranty Guarantee Deleted Successfully');
    }
}
