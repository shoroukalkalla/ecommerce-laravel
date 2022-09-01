<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
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

    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);

        Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_id' => $request->category,
            'image' => $imagename,
        ]);

        return redirect()->back()->with('success', 'Product created successfully');
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update_product', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
        }

        Product::where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'category_id' => $request->category,
            'image' => $imagename,
        ]);

        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function delete_product($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function order()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }
}