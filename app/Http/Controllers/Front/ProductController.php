<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Florist;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Shop;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = ProductGallery::all();
        $products = Product::all();
        return view('front.products.index', compact('products', 'galleries'));
    }

    public function create()
    {
        $categories = Category::all();
        $florists = Florist::all();

        return view('front.products.create', compact('categories', 'florists'));
    }

    public function store(StoreProductRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('app.login')->with('error', 'You must be logged in to create a product.');
        }

        $shop = Shop::where('user_id', auth()->id())->find($request->shop_id);

        if (!$shop) {
            return redirect()->back()->with('error', 'You can only create products for your own store.');
        }

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['florist_id'] = Florist::first()->id;
        $validated['shop_id'] = $shop->id;

        if ($request->hasFile('product_image')) {
            $validated['product_image'] = Storage::putFile('public/uploads/products/images', $request->file('product_image'));
        }

        $product = Product::create($validated);

        if ($request->hasFile('galleries')) {
            $galleries = $request->file('galleries');
            $galleryPaths = [];

            foreach ($galleries as $gallery) {
                $path = Storage::putFile('public/uploads/products/galleries', $gallery);
                $galleryPaths[] = [
                    'product_id' => $product->id,
                    'path' => $path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            ProductGallery::insert($galleryPaths);
        }

        return redirect()->route('app.products.index')->with('success', 'Product created successfully!');

    }


//    public function show(string $slug)
//    {
//        $product = Product::where('slug', $slug)->first();
//        $galleries = ProductGallery::where('product_id', $product->id)->get();
//
//        return view('front.products.show', compact('product', 'galleries'));
//    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $florists = Florist::all();

        return view('front.products.edit', compact('product', 'categories', 'florists'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('product_image')) {
            if ($product->product_image) Storage::delete($product->product_image);
            $validated['product_image'] = $request->file('product_image')->store('uploads/products/images', 'public');
        }
        $product->update($validated);
        return redirect()->route('app.products.index')->with('success', 'Product updated successfully.');
    }


    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if($product->product_image){
            Storage::delete($product->product_image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
