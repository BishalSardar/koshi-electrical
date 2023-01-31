<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
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
        return redirect()->route('contract.index')->with('success', 'Contract Updated Successfully');
    }


    // change contract status
    public function contractStatus($id)
    {
        $contract = Contract::find($id);
        $contract->status = !$contract->status;
        $contract->update();
        return redirect()->back()->with('success', 'Contract Status Changed Successfully');
    }
}
