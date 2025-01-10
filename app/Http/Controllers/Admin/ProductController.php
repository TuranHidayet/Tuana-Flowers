<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Florist;
use App\Models\Product;
use App\Models\ProductGallery;
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
        return view('admin.products.index', compact('products', 'galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $florists = Florist::all();

        return view('front.products.create', compact('categories', 'florists'));
    }

    public function store(StoreProductRequest $request, Product $product)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('product_image')) {
                $validated['product_image'] = $request->file('product_image')->store('uploads/products/images', 'public');
            }


            $selectedFeatures = $request->input('features', []);
            $validated['features'] = $selectedFeatures ? json_encode($selectedFeatures) : null;

            $validated['category_id'] = $request->input('category_id');
            $validated['florist_id'] = $request->input('florist_id');

            $created = Product::create($validated);

            if ($created) {
                if ($request->hasFile('galleries')) {
                    foreach ($request->file('galleries') as $image) {
                        $path = $image->store('uploads/products/galleries', 'public');

                        ProductGallery::create([
                            'product_id' => $created->id,
                            'image' => $path,
                        ]);
                    }
                }

                Log::info("Məhsul uğurla yaradıldı: " . $created->name . ' | IP: ' . $request->ip());
            }

            return redirect()->route('admin.products.index')->with('success', __('Məhsul uğurla yaradıldı.'));
        } catch (\Exception $exception) {
            Log::error('Məhsul yaratmaqda səhv: ' . $exception->getMessage());
            return redirect()->back()->with('error', __('Xəta baş verdi: ') . $exception->getMessage());
        }
    }

    public function show(string$id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $florists = Florist::all();

        return view('admin.products.edit', compact('product', 'categories', 'florists'));
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
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
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
