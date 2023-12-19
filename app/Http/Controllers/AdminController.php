<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Coffee;
use App\Models\Promotion;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function dashboard(){
        $search = request('search');
        return view('admin.dashboard',[
            'products' => Coffee::where('name','Like','%'.$search.'%')->get(),
            'user' => auth()->user()
        ]);
    }

    public function create(){
        return view('admin.create',[
            'user' => auth()->user()
        ]);
    }

    public function createPromotion(){
        return view('admin.createPromotion',[
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request){
        $cleanData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
        ]);
        $cleanData['image'] = $request->file('image')->store('images');
        $newProduct = Coffee::create($cleanData);
        //mail to subscriber user
        Subscribe::all()->each(function ($user) use($newProduct){
            Mail::to($user->email)->queue(new NotifyUser($newProduct,auth()->user()));
        });
        return back()->with('flashMessage','Create Product is successful');
    }

    public function promotionStore(Request $request){
        $cleanData = $request->validate([
            'content'=>['required'],
            'image'=>['required','image']
        ]);
        $cleanData['image'] = $request->file('image')->store('images');
        Promotion::create($cleanData);
        return back()->with('flashMessage','Add Promotion is successful.');
    }

    public function sortByName(){
        return view('admin.dashboard',[
            'products' => Coffee::orderBy('name','asc')->get(),
            'user' => auth()->user()
        ]);
    }

    public function sortByDate(){
        return view('admin.dashboard',[
            'products' => Coffee::orderBy('created_at','desc')->get(),
            'user' => auth()->user()
        ]);
    }
}
