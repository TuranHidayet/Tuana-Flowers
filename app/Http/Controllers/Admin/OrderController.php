<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function store(OrderRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
            'delivery_address' => $request->delivery_address,
            'phone' => $request->phone,
            'notes' => $request->notes,
        ]);

        return redirect()->route('admin.orders.index')->with('success', 'Sifariş uğurla yaradıldı.');
    }

    private function calculatePrice($productId, $quantity)
    {
        $product = Product::findOrFail($productId);
        return $product->price * $quantity;
    }
}
