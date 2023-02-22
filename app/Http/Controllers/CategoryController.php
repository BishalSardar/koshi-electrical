<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // category index page function
    public function categoryIndex()
    {
        $categories = Category::all();
        $total_category = Category::all()->count();

        return view('category.index', compact('categories', 'total_category'));
    }

    // category create page function
    public function categoryCreate()
    {
        return view('category.create');
    }

    // category store function
    public function categoryStore(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;

            $category->save();

            return redirect()->route('category.index')->with('success', "Category Added Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Adding Category');
        }
    }

    // category edit page function
    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    // category update function
    public function categoryUpdate(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;

            $category->update();

            return redirect()->route('category.index')->with('success', "Category Updated Successfully");
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Error While Updating Category');
        }
    }

    // category delete function
    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', "Category Deleted Successfully");
    }
}
