<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function changeImg(){
       $img = request('image');
       if($img){
            auth()->user()->update(['image'=> $img]);
            return back()->with('flashMessage','change profile image is successful');
       }
       return back();
    }

    public function changeProfile(){
        $cleanData = request()->validate([
            'email' => ['required',Rule::unique('users','email')],
            'name' => 'required',
        ]);
        if($cleanData){
            auth()->user()->update($cleanData);
            return back()->with('flashMessage','change username and email is successful');
        }
        return back();
    }
}
