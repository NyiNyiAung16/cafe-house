<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeListsController extends Controller
{
    public function create(Request $request){
      $cleanData = $request->validate([
        'name' => 'required',
        'price' => 'required',
        'image' => 'required|image'
      ]);
      $cleanData['image'] = $request->file('image')->store('/images');
      Coffee::create($cleanData);
      return back();
    }
}
