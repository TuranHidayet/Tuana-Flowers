<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = Shop::all();
        return view('admin.shops.index', compact('shops'));
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);

        return view('admin.shops.show', compact('shop'));
    }
}
