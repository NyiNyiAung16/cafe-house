<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function login(){
        return view('auth.login');
    }

    public function registerStore(Request $request){
        $cleanData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>['required','confirmed','max:15','min:6'],
        ]);
        $user = User::create($cleanData);
        auth()->login($user);
        return redirect('/')->with('flashMessage','Register is successful');
    }

    public function loginStore(Request $request){
        $cleanData = $request->validate([
            'email' => 'required',
            'password' =>'required|max:15|min:6'
        ]);
       auth()->attempt($cleanData,true);
       return redirect('/')->with('flashMessage','Login is successful');
    }

    public function logout(){
        auth()->logout();
        return back()->with('flashMessage','Logout is successful');
    }
}
