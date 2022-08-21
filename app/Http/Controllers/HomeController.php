<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.userpage');
    }

    public function redirect()
    {
        $userType = Auth::user()->user_type;
        if ($userType == '1') {
            return view('admin.home');
        } else {
            return view('dashboard');
        }
    }
}