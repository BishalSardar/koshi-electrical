<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProducts;
use App\Models\Product;
use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;

class CustomerBillController extends Controller
{
    // customer bill index page function 
    public function customerBillIndex()
    {
        return view('customer-bill.index');
    }


    // customer bill page function
    public function customerBillCreate()
    {
        $customers = Customer::where('status', 1)->get();
        $products = Product::all();
        return view('customer-bill.create', compact('customers', 'products'));
    }


    // customer bill create function
    public function customerBillStore(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'invoice_date' => 'required'
            ]);

            $customer_bill = new CustomerBill();

            $customer_bill->customer_id = $request->customer_id;
            $customer_bill->invoice_date = $request->invoice_date;
            $customer_bill->gross_total_amount = $request->gross_total_amount;
            $customer_bill->discount = $request->discount;
            $customer_bill->net_total_amount = $request->net_total_amount;
            $customer_bill->remark = $request->remark;
            $customer_bill->invoice_type = $request->cr_or_dr;
            if ($request->status == "unpaid") {
                $customer_bill->status = 0;
            } elseif ($request->status == "paid") {
                $customer_bill->status = 1;
            }


            $contract = Contract::where('customer_id', $request->customer_id)->first();

            if ($contract != null && $contract->status != 0) {
                $customer_bill->contract_id = $contract->id;
            }

            $customer_bill->save();

            for ($i = 0; $i < count($request->quantity); $i++) {
                $customer_bill_products = new CustomerBillProducts();
                $customer_bill_products->customerBill_id = $customer_bill->id;
                $customer_bill_products->product_id = intval($request->product_id[$i]);
                $customer_bill_products->quantity = $request->quantity[$i];
                $customer_bill_products->rate = $request->basic_rate[$i];
                $customer_bill_products->unit = $request->unit[$i];
                $customer_bill_products->amount = $request->amount[$i];

                $inventory = Stock::find($request->product_id[$i]);
                if ($request->quantity[$i] > $inventory->stock) {
                    $saved_customer_bill = CustomerBill::find($customer_bill->id);
                    $saved_customer_bill->delete();
                    return redirect()->back()->with('error', "Stock is not available");
                } else {
                    $inventory->stock = $inventory->stock - $request->quantity[$i];
                    $inventory->update();
                    $customer_bill_products->save();
                }
            }


            $customer = Customer::where('id', $request->customer_id)->first();
            if ($request->invoice_type == 'dr') {
                $customer->balance_amount += $request->net_total_amount;
            } else {
                $customer->balance_amount -= $request->net_total_amount;
            }
            if ($customer->balance_amount < 0) {
                $customer->cr_or_dr = 'cr';
            } else {
                $customer->cr_or_dr = 'dr';
            }

            $customer->update();

            return redirect()->route('customerBill.index')->with('success', "Customer Bill Created Successfully");
        } catch (Exception $exception) {
            return redirect()->route('customerBill.index')->with('error', $exception);
        }
    }
}
