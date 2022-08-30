<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
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

    public function add_to_cart(Request $request, $id)
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

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', $id)->get();
            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $userId = Auth::user()->id;

        $data = Cart::where('user_id', $userId)->get();

        foreach ($data as $data) {
            Order::create([
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address,
                'user_id' => $data->user_id,

                'product_title' => $data->product_title,
                'quantity' => $data->quantity,
                'price' => $data->price,
                'image' => $data->image,
                'product_id' => $data->product_id,

                'payment_status' => 'Cash On Delivery',
                'delivery_status' => 'Processing',
            ]);

            $cartId = $data->id;
            Cart::find($cartId)->delete();
        }
        return redirect()->back()->with('message', 'We Have Received Your Order. We will connect with you soon....');
    }
}