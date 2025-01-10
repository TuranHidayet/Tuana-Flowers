<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\CommentRequest;
use App\Models\Comments;
use App\Models\Product;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Your comment and rating have been submitted.');
    }

//    public function show($id, $slug)
//    {
//        $product = Product::where('id', $id)->firstOrFail();
//        $comments = $product->comments()->with('user')->get();
//        $averageRating = $comments->isNotEmpty() ? $comments->avg('rating') : 0;
//        dd($averageRating);
//        $commentCount = $comments->count();
//        return view('front.products.show', compact('product','comments', 'averageRating', 'commentCount'));
//    }
}

