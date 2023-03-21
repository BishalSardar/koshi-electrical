<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Exception;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expenseIndex()
    {
        $expenses = Expense::all();
        return view('expense.index', compact('expenses'));
    }

    public function expenseCreate()
    {
        return view('expense.create');
    }


    public function expenseStore(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'cost' => 'required',
            ]);
            $expenses = new Expense();

            $expenses->description = $request->description;
            $expenses->date = $request->date;
            $expenses->cost = $request->cost;
            $expenses->save();
            return redirect()->route('expense.index')->with('success', "Expense Added Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }


    public function expenseEdit($id)
    {
        $expense = Expense::find($id);
        return view('expense.edit', compact('expense'));
    }


    public function expenseUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'cost' => 'required',
            ]);
            $expenses = Expense::find($id);

            $expenses->description = $request->description;
            $expenses->date = $request->date;
            $expenses->cost = $request->cost;
            $expenses->update();
            return redirect()->route('expense.index')->with('success', "Expense Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception);
        }
    }


    // expense delete function 
    public function expenseDelete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('success', "Expense Deleted Successfully");
    }
}
