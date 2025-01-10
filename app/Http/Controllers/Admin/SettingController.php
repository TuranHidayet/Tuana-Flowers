<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(SettingRequest $request)
    {
        $validated = $request->validated();

        $setting = Setting::first();

        if($request->hasFile('set_image')){
            Storage::delete($setting->set_image);
            $validated['set_image'] = Storage::putFile('public/uploads/settings', $request->file('set_image'));
        }

        if($setting){
            $setting->update($validated);
        }else{
            Setting::create($validated);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated successfully.');
    }
}
