<?php

namespace App\Http\Controllers;

use App\Models\Stock;
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
}
