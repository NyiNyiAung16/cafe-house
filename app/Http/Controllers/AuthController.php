<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'email' => ['required',Rule::unique('users','email')],
            'password' =>['required','confirmed','max:15','min:6'],
        ]);
        $user = User::create($cleanData);
        auth()->login($user);
        return redirect('/')->with('flashMessage','Register is successful');
    }

    public function loginStore(Request $request){
        $cleanData = $request->validate([
            'email' => ['required',Rule::exists('users','email')],
            'password' =>'required|max:15|min:6'
        ],['email.exists'=>'Your Credients is not correct.']);
       auth()->attempt($cleanData,true);
       return redirect('/')->with('flashMessage','Login is successful');
    }

    public function logout(){
        auth()->logout();
        return back()->with('flashMessage','Logout is successful');
    }
}
