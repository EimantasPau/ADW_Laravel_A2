<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Auth;
use Session;

class ReviewController extends Controller
{
    public function store(Request $request, $id) {
        $request->validate([
            'body' => 'required',
            'rating' => 'required'
        ]);
        $user = Auth::user();
        $product = Product::findOrFail($id);
        $review = new Review;
        $review->rating = $request->rating;
        $review->body = $request->body;
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->save();
        Session::flash('successMessage', 'You have successfully submited a review!');
        return redirect()->back();
    }
}
