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


        Shop::create($validated);

        return redirect()->route('app.shops.index')->with('success', 'Mağaza uğurla yaradıldı!');
    }


    public function show($slug)
    {

        $shop = Shop::where('slug', $slug)->first();
        $products = Product::where('shop_id', $shop->id)->get();

        if(!$shop)
            abort(404);

        return view('front.shops.show', compact('shop', 'products'));
    }


    public function edit(string $id)
    {
        $shop = Shop::findOrFail($id);
        return view('front.shops.edit', compact('shop'));
    }
    public function update(StoreShopRequest $request, string $id)
    {
        $shop = Shop::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($shop->logo) Storage::delete($shop->logo);
            $validated['logo'] = $request->file('logo')->store('uploads/shops/logos', 'public');
        }
        $shop->update($validated);
        return redirect()->route('app.shops.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $shop = Shop::findOrFail($id);

        if($shop->id){
            Storage::delete($shop->logo);
        }

        $shop->delete();

        return redirect()->route('app.profile')->with('success', 'Shop deleted successfully.');
    }
}
