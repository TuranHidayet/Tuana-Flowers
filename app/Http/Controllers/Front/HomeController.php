<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $products = Product::where('stock', 'active')->get();
        $sliders = Slider::all();
        return view('front.home', compact('products', 'sliders', 'categories'));
    }

    public function showProduct($slug)
    {
//        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
//        $cartTotal = $cartItems->sum(function ($item) {
//            return $item->product->price * $item->quantity;
//        });
        $product = Product::where('slug', $slug)->first();
        $averageRating = $product->comments->isNotEmpty() ? $product->comments->avg('rating') : 0;

        if(!$product)
            abort(404);

        return view('front.product_details', compact('product', 'averageRating'));
    }

}
