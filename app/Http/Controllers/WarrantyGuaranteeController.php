<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warranty_Guarantee;
use Exception;
use Illuminate\Http\Request;

class WarrantyGuaranteeController extends Controller
{
    public function warrantyGuaranteeIndex()
    {
        $warranty_guaranties = Warranty_Guarantee::all();
        $warranty_guarantee_count = count(Warranty_Guarantee::all());
        return view('warranty_guarantee.index', compact('warranty_guaranties', 'warranty_guarantee_count'));
    }

    public function warrantyGuaranteeCreate()
    {
        $products = Product::all();
        return view('warranty_guarantee.create', compact('products'));
    }

    public function warrantyGuaranteeStore(Request $request)
    {
        try {
            $warranty_guarantee = new Warranty_Guarantee();
            $warranty_guarantee->product_id = $request->product_id;
            $warranty_guarantee->issued_by = $request->issued_by;
            $warranty_guarantee->type = $request->type;
            $warranty_guarantee->time_period = $request->time_period;
            $warranty_guarantee->description = $request->description;
            $warranty_guarantee->save();
            return redirect()->route('warranty.guarantee.index')->with('success', "Warranty-Guaranty Added Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with($exception);
        }
    }
}
