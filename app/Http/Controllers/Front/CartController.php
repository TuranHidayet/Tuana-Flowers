<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Səbət səhifəsini göstərir
    public function cartIndex()
    {
        $cart = session()->get('cart', []); // Sessiyadakı səbət məlumatları

        if (empty($cart)) {
            return view('front.cart')->with('message', 'Səbətiniz boşdur.');
        }

        // Subtotal qiyməti hesablayırıq
        $subtotal = collect($cart)->sum(function ($item) {
            return isset($item['price'], $item['quantity'])
                ? $item['price'] * $item['quantity']
                : 0;
        });

        return view('front.cart', compact('cart', 'subtotal'));
    }

    // Məhsulu səbətə əlavə etmək
    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []); // Sessiyadakı mövcud səbəti götürürük

        $productId = $request->input('id'); // Məhsul ID-si
        $product = $request->only(['id', 'name', 'image', 'price', 'quantity']); // Məhsul məlumatları

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $product['quantity'];
        } else {
            $cart[$productId] = $product;
        }

        session(['cart' => $cart]);

        $subtotal = collect($cart)->sum(function ($item) {
            return isset($item['price'], $item['quantity'])
                ? $item['price'] * $item['quantity']
                : 0;
        });

        return response()->json(['subtotal' => $subtotal, 'message' => 'Məhsul səbətə əlavə edildi.']);
    }

    // Məhsulun miqdarını yeniləmək
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session(['cart' => $cart]);

            $subtotal = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            return response()->json(['subtotal' => $subtotal, 'message' => 'Səbət yeniləndi.']);
        }

        return response()->json(['message' => 'Məhsul tapılmadı.'], 404);
    }

    // Məhsulu səbətdən silmək
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('id');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);

            $subtotal = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });

            return response()->json(['subtotal' => $subtotal, 'message' => 'Məhsul səbətdən silindi.']);
        }

        return response()->json(['message' => 'Məhsul tapılmadı.'], 404);
    }

    // Səbəti boşaltmaq
    public function clearCart()
    {
        session()->forget('cart');
        return response()->json(['message' => 'Səbət boşaldıldı.']);
    }

    // Sifarişi tamamlamaq
    public function completeOrder()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return response()->json(['message' => 'Səbətiniz boşdur.'], 400);
        }

        foreach ($cart as $item) {
            DB::table('orders')->insert([
                'user_id' => auth()->id(),
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        session()->forget('cart');
        return response()->json(['message' => 'Sifarişiniz uğurla tamamlandı!']);
    }
}
