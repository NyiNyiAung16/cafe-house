<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coffee;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Coffee $coffee){
        if(!auth()->user()->addToCartsCoffee->contains('id',$coffee->id)){
            $coffee->addToCartsUser()->attach(auth()->id());
            return back()->with('flashMessage','Add To Carts is successful');
        }

        return back()->with('flashMessage','already includes in carts');
    }
}
