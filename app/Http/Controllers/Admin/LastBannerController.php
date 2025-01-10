<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LastBannerRequest;
use App\Models\LastBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LastBannerController extends Controller
{
    public function index()
    {
        $banners = LastBanner::all();

        return view('admin.banners.last_banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(StoreSliderRequest $request)
    {
        $validated = $request->validated();

        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('uploads/sliders/images', 'public');
        }

        LastBanner::create($validated);

        return redirect()->route('admin.slider.index')->with('success', 'Created successfully');
    }

    public function edit(string $id)
    {
        $slider = LastBanner::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(UpdateSliderRequest $request, string $id)
    {
        $slider = LastBanner::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($slider->image) Storage::delete($slider->image);
            $validated['image'] = $request->file('image')->store('uploads/sliders/images', 'public');
        }
        $slider->update($validated);
        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = LastBanner::findOrFail($id);

        if($product->product_image){
            Storage::delete($product->product_image);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully.');
    }
}
