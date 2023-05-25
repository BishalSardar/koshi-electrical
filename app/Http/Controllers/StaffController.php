<?php

namespace App\Http\Controllers;

use App\Mail\StaffAccountActivation;
use App\Models\Staff;
use App\Models\StaffAccount;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{
    public function staffIndex()
    {
        $staffCount = Staff::count();
        $staffs = Staff::all();
        return view('staff.index', compact('staffCount', 'staffs'));
    }

    public function staffCreate()
    {
        return view('staff.create');
    }


    public function staffStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

            $staff = new Staff();

            if ($request->file('image')) {
                $image_dest = 'admin/images/staff/' . $staff->image;
                if (File::exists($image_dest)) {
                    File::delete($image_dest);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/images/staff'), $filename);
                $staff->image = $filename;
            }
            $staff->name = $request->name;
            $staff->address = $request->address;
            $staff->phone = $request->phone;
            $staff->salary = $request->salary;
            $staff->current_month_salary = $request->salary;
            $staff->email_address = $request->email_address;

            $staff->save();

            $mailData = [
                'name' => $request->name,
                'address' => $request->address,
                'salary' => $request->salary
            ];

            Mail::to($request->email_address)->send(new StaffAccountActivation($mailData));

            return redirect()->route('staff.index')->with('success', "Staff Added Successfully");
        } catch (Exception $exception) {
            // return redirect()->back()->with('error', 'Error While Adding Staff');
            dd($exception);
        }
    }

    public function staffEdit($id)
    {
        $staff = Staff::find($id);
        return view('staff.edit', compact('staff'));
    }


    public function staffUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required'
            ]);

            $staff = Staff::find($id);

            if ($request->file('image')) {
                $image_dest = 'admin/images/staff/' . $staff->image;
                if (File::exists($image_dest)) {
                    File::delete($image_dest);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/images/staff'), $filename);
                $staff->image = $filename;
            }
            $staff->name = $request->name;
            $staff->address = $request->address;
            $staff->phone = $request->phone;
            $staff->salary = $request->salary;
            $staff->email_address = $request->email_address;

            $staff->update();

            return redirect()->route('staff.index')->with('success', "Staff Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Staff');
        }
    }

    public function staffDelete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        return redirect()->route('staff.index')->with('success', "Staff Deleted Successfully");
    }

    public function staffProfile($id)
    {
        $staff = Staff::find($id);
        $staffAccounts = StaffAccount::where('staff_id', $id)->get();
        // dd($staffAccounts);
        return view('staff.profile', compact('staff', 'staffAccounts'));
    }


    public function staffBorrow($id)
    {
        $staff = Staff::find($id);
        return view('staff.borrow', compact('staff'));
    }


    public function staffBorrowStore(Request $request, $id)
    {
        $staffAccount = new StaffAccount();
        $staffAccount->staff_id = $id;
        $staffAccount->invoice_date = $request->invoice_date;
        $staffAccount->amount = $request->amount;
        $staffAccount->type = 'borrow';
        $staffAccount->save();

        $staff = Staff::find($id);
        $staff->borrow_amount += $request->amount;
        $staff->total_earning += $request->amount;
        $staff->current_month_salary -= $request->amount;
        $staff->update();

        return redirect()->route('staff.profile', $id)->with('success', "Staff Updated Successfully");
    }


    public function staffSalary($id)
    {
        // dd($id);
        $staff = Staff::find($id);
        $staffAccount = new StaffAccount();
        $staffAccount->staff_id = $id;
        $staffAccount->invoice_date = Carbon::now();
        $staffAccount->amount = $staff->current_month_salary;
        $staffAccount->type = 'salary';
        $staffAccount->save();

        $staff->total_earning += $staff->current_month_salary;
        $staff->current_month_salary = $staff->salary;
        $staff->borrow_amount = 0;
        $staff->update();
        return redirect()->route('staff.profile', $id)->with('success', "Staff Salary Added Successfully");
    }
}
