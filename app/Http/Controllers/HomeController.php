<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }

    public function redirect()
    {
        $userType = Auth::user()->user_type;
        if ($userType == '1') {
            return view('admin.home');
        } else {
            $products = Product::paginate(3);
            return view('home.userpage', compact('products'));}
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_to_card(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            Cart::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'user_id' => $user->id,
                'product_title' => $product->title,
                'image' => $product->image,
                'price' => $product->discount_price ? $product->discount_price * $request->quantity : $product->price * $request->quantity,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);

            return redirect()->back();

        } else {
            return redirect('login');
        }
    }
}