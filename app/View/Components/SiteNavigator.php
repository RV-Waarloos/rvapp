<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Spatie\Navigation\Facades\Navigation;

class SiteNavigator extends Component
{
    public $navigationTree = null;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->navigationTree = Navigation::make()->tree();
        $r = Route::getCurrentRoute();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site-navigator');
    }
}
