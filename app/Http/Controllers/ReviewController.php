<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        $cleanData = $request->validate([
            'body' => ['required']
        ]);
        $cleanData['user_id'] = auth()->id();
        Review::create($cleanData);
        return back()->with('flashMessage','Posting review is successful.');
    }

    public function destroy(Review $review){
        $review->delete();
        return back();
    }
}
