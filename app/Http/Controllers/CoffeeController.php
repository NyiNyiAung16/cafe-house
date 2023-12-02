<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Coffee;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CoffeeController extends Controller
{
    public function create(){
        $cleanData = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);
        $cleanData['image'] = request()->file('image')->store('images');
        $newProduct = Coffee::create($cleanData);
        //mail to subscriber user
        Subscribe::all()->each(function ($user) use($newProduct){
            Mail::to($user->email)->queue(new NotifyUser($newProduct,auth()->user()));
        });
        return redirect('/')->with('flashMessage','Create Coffee List is successful');
    }
}
