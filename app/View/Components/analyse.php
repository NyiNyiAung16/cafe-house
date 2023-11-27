<?php

namespace App\View\Components;

use App\Models\Coffee;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class analyse extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.analyse',[
            'lists' => Coffee::where('count','>',0)->take(5)->get()
        ]);
    }
}
