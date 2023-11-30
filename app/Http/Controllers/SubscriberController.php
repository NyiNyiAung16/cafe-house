<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $cleanData = $request->validate([
            'email' => ['required',Rule::unique('subscribes','email')]
        ]);
        $cleanData['user_id'] = auth()->id();
        $subscribe = Subscribe::create($cleanData);
        $subscribe->user->isSubscribe = true;
        $subscribe->user->save();
        return back()->with('flashMessage','Subscribe is successful');
    }
}
