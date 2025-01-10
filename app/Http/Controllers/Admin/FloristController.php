<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FloristRequest;
use App\Models\Florist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FloristController extends Controller
{

    public function index()
    {
        $florists = Florist::all();
        return view('admin.florists.index', compact('florists'));
    }

    public function create()
    {
        return view('admin.florists.create');
    }

    public function store(FloristRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('florist_avatar')) {
                $validated['florist_avatar'] = Storage::putFile('public/uploads/florists/avatars', $request->file('florist_avatar'));
            }

            $created = Florist::create($validated);

            if ($created) {
                Log::info("Florist uğurla yaradıldı: " . $created->name . ' | IP: ' . $request->ip());
            }

            return redirect()->route('admin.florists.index')->with('success', __('Florist uğurla yaradıldı.'));
        } catch (\Exception $exception) {
            Log::error('Florist yaratmaqda səhv: ' . $exception->getMessage());
            return redirect()->back()->with('error', __('Xəta baş verdi: ') . $exception->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        try {
            $florist = Florist::findOrFail($id);

            return view('admin.florists.edit', compact('florist'));
        } catch (\Exception $exception) {
            Log::error('Florist redaktə səhifəsinə keçiddə səhv: ' . $exception->getMessage());
            return redirect()->route('admin.florists.index')->with('error', __('Xəta baş verdi: ') . $exception->getMessage());
        }
    }

    public function update(FloristRequest $request, $id)
    {
        $florist = Florist::findOrFail($id);

        try {
            $florist->name = $request->input('name');
            $florist->email = $request->input('email');
            $florist->phone = $request->input('phone');
            $florist->address = $request->input('address');

            if ($request->hasFile('florist_avatar')) {
                if ($florist->florist_avatar) {
                    Storage::delete($florist->florist_avatar);
                }
                $florist->florist_avatar = Storage::putFile('public/uploads/florists/avatars', $request->file('florist_avatar'));
            }

            $florist->save();

            Log::info("Florist uğurla güncelləndi: " . $florist->name . ' | IP: ' . $request->ip());

            return redirect()->route('admin.florists.index')->with('success', __('Florist uğurla yeniləndi.'));
        } catch (\Exception $exception) {
            Log::error('Florist güncellenmesinde səhv: ' . $exception->getMessage());
            return redirect()->back()->with('error', __('Xəta baş verdi: ') . $exception->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            $florist = Florist::findOrFail($id);

            if ($florist->florist_image) {
                Storage::delete($florist->florist_image);
            }

            $florist->delete();

            return redirect()->route('admin.florists.index')->with('success', 'Florist successfully deleted.');
        } catch (\Exception $e) {
            return redirect()->route('admin.florists.index')->with('error', 'Error deleting florist: ' . $e->getMessage());
        }
    }
}
