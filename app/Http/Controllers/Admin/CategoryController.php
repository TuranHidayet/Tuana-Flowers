<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully');

    }

    public function show(string $id)
    {
        $categories = Category::all();
        $category = Category::with('products')->findOrFail($id);
        $products = Product::where('category_id', $category->id)->get();
        return view('front.category.index', compact('category', 'products', 'categories'));
    }


    public function change(string $id)
    {
        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('success', 'Category status changed');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
