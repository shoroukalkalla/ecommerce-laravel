<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->back()->with('danger', 'Category Deleted Successfully');
    }
}