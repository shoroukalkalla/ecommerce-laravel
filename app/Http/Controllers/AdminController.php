<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->back()->with('message', 'Category Added Successfully');
    }
}