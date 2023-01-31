<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //index route function
    public function customerIndex()
    {
        $customers = Customer::all();
        $totalCustomer = Customer::count();
        return view('customer.index', compact('customers', 'totalCustomer'));
    }

    // create page route function 
    public function customerCreate()
    {
        return view('customer.create');
    }

    // store customer function
    public function customerStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

            $customer = new Customer();

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;

            $customer->save();

            return redirect()->route('customer.index')->with('success', "Customer Added Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Customer');
        }
    }

    // customer edit page function 
    public function customerEdit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    // customer update function
    public function customerUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $customer = Customer::find($id);

            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->address = $request->address;

            $customer->save();

            return redirect()->route('customer.index')->with('success', "Customer Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Updating Customer');
        }
    }

    // customer delete function 
    public function customerDelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', "Customer Deleted Successfully");
    }

    // customer profile function
    public function customerProfile($id)
    {
        $customer = Customer::find($id);
        return view('customer.profile', compact('customer'));
    }

    // customer change Status
    public function customerStatus($id)
    {
        $customer = Customer::find($id);
        $customer->status = !$customer->status;
        $customer->update();
        return redirect()->back()->with('success', "Customer Status Changed Successfully");
    }
}
