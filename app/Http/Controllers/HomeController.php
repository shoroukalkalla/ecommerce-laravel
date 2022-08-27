<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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
}