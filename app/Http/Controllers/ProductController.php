<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // product index function
    public function productIndex()
    {
        $products = Product::all();
        $totalProduct = Product::count();
        return view('product.index', compact('products', 'totalProduct'));
    }

    // product get method using ajax
    public function productGet()
    {
        try {
            $product = Product::all();
            return response([
                'product' => $product,

            ]);
        } catch (Exception $exception) {
            return response([
                'message' => 'error' . $exception,
            ]);
        }
    }

    // product add product page function
    public function productCreate()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    // product store function
    public function productStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $product = new Product();

            if ($request->file('image')) {
                $image_dest = 'admin/images/product/' . $product->image;
                if (File::exists($image_dest)) {
                    File::delete($image_dest);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/images/product'), $filename);
                $product->image = $filename;
            }
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;

            $product->save();

            $inventory = new Stock();
            $inventory->product_id = $product->id;
            $inventory->save();

            return redirect()->route('product.index')->with('success', "Product Added Successfully");   
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Product');
        }
    }

    // product edit function
    public function productEdit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    // product update function
    public function productUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $product = Product::find($id);

            if ($request->file('image')) {
                $image_dest = 'admin/images/product/' . $product->image;
                if (File::exists($image_dest)) {
                    File::delete($image_dest);
                }
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('admin/images/product'), $filename);
                $product->image = $filename;
            }
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->update();
            return redirect()->route('product.index')->with('success', "Product Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Updating Product');
        }
    }

    // product delete function 
    public function productDelete($id)
    {
        $product = Product::find($id);
        $image_dest = 'admin/images/product/' . $product->image;
        if (File::exists($image_dest)) {
            File::delete($image_dest);
        }
        $product->delete();
        return redirect()->back()->with('success', "Product Deleted Successfully");
    }
}
