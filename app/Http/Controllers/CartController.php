<?php

namespace App\Http\Controllers;

use App\Models\Analyse;
use App\Models\Coffee;


class CartController extends Controller
{
    public function store(Coffee $coffee){
        if(!auth()->user()->addToCartsCoffee->contains('id',$coffee->id)){
            $coffee->addToCartsUser()->attach(auth()->id());
            if(!Analyse::where('coffee_name',$coffee->name)->exists()){
                Analyse::create([
                    'coffee_name' => $coffee->name,
                    'count'=> 1
                ]);
            }else{
                $analyse = Analyse::where('coffee_name',$coffee->name)->first();
                $count = ++$analyse->count;
                $analyse->update(['count'=>$count]);
            }
            return back()->with('flashMessage','Add To Carts is successful');
        }

        return back()->with('flashMessage','already includes in carts');
    }

    public function show(){
       return view('cart.show',[
            'products' => auth()->user()->addToCartsCoffee
       ]);
    }

    public function destroy(Coffee $coffee){
        $coffee->addToCartsUser()->detach(auth()->id());
        return back();
    }
}
