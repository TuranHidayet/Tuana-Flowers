<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use http\Env\Request;

class CartController extends Controller
{
    public function cartIndex()
    {
//        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
//        $cartTotal = $cartItems->sum(function ($item) {
//            return $item->product->price * $item->quantity;
//        });

        return view('cart.index');
    }

    public function showCart()
    {
//        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();

        return view('app.cart.index');
    }

    public function addToCart(\Illuminate\Http\Request $request)
    {
        $product = Product::find($request->product_id);


        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            "name" => $product->name,
            "quantity" => ($cart[$product->id]['quantity'] ?? 0) + 1,
            "price" => $product->price,
            "image" => $product->product_image,
        ];
        session()->put('cart', $cart);

        return response()->json(['success' => 'Product added to cart', 'cart' => $cart]);
    }

    public function getCartItems()
    {
        $cart = session()->get('cart', []);
        return response()->json($cart);
    }
}
