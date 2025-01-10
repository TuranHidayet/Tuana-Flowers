<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreShopRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {

        $shops = Shop::all();
        $categories = Category::all();
        return view('front.shops.index', compact('categories', 'shops'));
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('app.login')->with('error', 'You must be logged in to create a shop.');
        }

        $shops = Shop::where('user_id', auth()->id())->get();

        return view('front.shops.create', compact('shops'));
    }

    public function store(StoreShopRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('app.login')->with('error', 'Mağaza yaratmaq üçün daxil olun.');
        }

        $validated = $request->validated();

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('logo')) {
            $validated['logo'] = Storage::putFile('public/uploads/shops/logos', $request->file('logo'));
        }

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = Storage::putFile('public/uploads/shops/covers', $request->file('cover_image'));
        }

        $shop = Shop::create($validated);

        return redirect()->route('app.shops.index')->with('success', 'Mağaza uğurla yaradıldı!');
    }




    public function show($slug)
    {

        $products = Product::where('stock', 'active')->get();

        $shop = Shop::where('slug', $slug)->first();

        if(!$shop)
            abort(404);

        return view('front.shops.show', compact('shop', 'products'));
    }
}
