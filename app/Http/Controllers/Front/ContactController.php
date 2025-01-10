<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('front.contact');
    }


    public function store(StoreContactRequest $request)
    {
        try {
            $validated = $request->validated();
            $created = Contact::create($validated);

            if (!$created) {
                return response()->json(['error' => 'Something went wrong'], 500);
            }

            return response()->json(['success' => 'Thanks for contacting us!'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->validator->errors()
            ], 422);
        }
    }
}
