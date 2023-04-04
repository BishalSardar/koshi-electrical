<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProduct;
use App\Models\CustomerBillProducts;
use Exception;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    // contract index page function
    public function contractIndex()
    {
        $contracts = Contract::all();
        return view('contract.index', compact('contracts'));
    }

    // contract create page function
    public function contractCreate()
    {
        $customers = Customer::where('status', 1)->get();
        return view('contract.create', compact('customers'));
    }


    // contract store function
    public function contractStore(Request $request)
    {
        try {
            $request->validate([
                'customer_id' => 'required',
                'starting_date' => 'required',
            ]);

            $contract = new Contract();

            $contract->customer_id = $request->customer_id;
            $contract->starting_date = $request->starting_date;

            $contract->save();
            return redirect()->route('contract.index')->with('success', "Contract Created Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }


    // contract edit page function
    public function contractEdit($id)
    {
        $contract = Contract::find($id);
        return view('contract.edit', compact('contract'));
    }


    // contract update function
    public function contractUpdate(Request $request, $id)
    {
        $contract = Contract::find($id);
        $contract->starting_date = $request->starting_date;
        $contract->update();
        return redirect()->route('contract.index')->with('success', 'Contract Updated Successfully');
    }

    // contract delete function
    public function contractDelete($id)
    {
        $contract = Contract::find($id);
        $contract->delete();
        return redirect()->route('contract.index')->with('success', 'Contract Deleted Successfully');
    }


    // change contract status
    public function contractStatus($id)
    {
        $contract = Contract::find($id);
        $contract->status = !$contract->status;
        $contract->update();
        return redirect()->back()->with('success', 'Contract Status Changed Successfully');
    }


    // contract profile 
    public function contractProfile($id)
    {
        $contract = Contract::find($id);
        $customer = Customer::find($contract->customer_id);
        $contract_bills = CustomerBill::where('contract_id', $id)->get();

        $contract_bills_unpaid = CustomerBill::where('contract_id', $id)->where('status', 0)->get();

        $total_amount = 0;

        foreach ($contract_bills_unpaid as $bill) {
            $total_amount = $total_amount + $bill->net_total_amount;
        }

        $unpaid_contract_bills = CustomerBill::where('contract_id', $id)->where('status', 0)->get();
        $paid_contract_bills = CustomerBill::where('contract_id', $id)->where('status', 1)->get();

        $new_bill = [];
        for ($i = 0; $i < count($contract_bills); $i++) {
            array_push($new_bill, $contract_bills[$i]->id);
        }

        $new_bill_details = [];
        for ($i = 0; $i < count($contract_bills); $i++) {
            array_push($new_bill_details, CustomerBillProduct::where('customerBill_id', $new_bill[$i])->get());
        }

        $new_bill_details_filtered = array_filter($new_bill_details, fn ($value) => !is_null($value));


        return view('contract.profile', compact('customer', 'contract', 'contract_bills', 'unpaid_contract_bills', 'total_amount', 'paid_contract_bills', 'new_bill_details_filtered'));
    }
}
