<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProduct;
use App\Models\CustomerBillProducts;
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
        $customer_bills = CustomerBill::where('customer_id', $id)->get();
        $no_of_bills = CustomerBill::count();

        $new_bill = [];
        for ($i = 0; $i < count($customer_bills); $i++) {
            array_push($new_bill, $customer_bills[$i]->id);
        }

        $new_bill_details = [];
        for ($i = 0; $i < count($customer_bills); $i++) {
            array_push($new_bill_details, CustomerBillProduct::where('customerBill_id', $new_bill[$i])->get());
        }

        return view('customer.profile', compact('customer', 'customer_bills', 'new_bill_details', 'no_of_bills'));
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
