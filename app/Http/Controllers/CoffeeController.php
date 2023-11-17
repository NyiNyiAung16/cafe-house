<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function create(){
        $cleanData = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);
        $cleanData['image'] = request()->file('image')->store('images');
        Coffee::create($cleanData);
        return back()->with('flashMessage','Create is successful');
    }
}
