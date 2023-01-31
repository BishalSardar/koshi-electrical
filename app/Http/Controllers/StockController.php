<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;

class StockController extends Controller
{
    // stock index page function
    public function stockIndex()
    {
        $stocks = Stock::all();
        $no_of_stocks = count($stocks);
        $no_of_stocks_available = count(Stock::where('stock', '>', 0)->get());
        $no_of_stocks_out_of_stock = count(Stock::where('stock', '=', 0)->get());
        return view('stock.index', compact('stocks', 'no_of_stocks', 'no_of_stocks_available', 'no_of_stocks_out_of_stock'));
    }

    // stock edit function 
    public function stockEdit($id)
    {
        $inventories = Stock::find($id);
        return response([
            'inventories' => $inventories,
        ]);
    }

    public function stockUpdate(Request $request, $id)
    {
        try {
            $inventory = Stock::find($id);
            $inventory->selling_price = $request->selling_price;
            $inventory->update();
            return redirect()->back()->with('success', "Selling Price Updated Successfully");
        } catch (Exception $exception) {
            dd($exception);
            return redirect()->back()->with('error', 'This is the error' . $exception);
        }
        return redirect()->back();
    }
}
