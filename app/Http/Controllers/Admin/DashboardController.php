<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $totalProducts = Product::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalUsers', 'totalProducts'));
    }
}
