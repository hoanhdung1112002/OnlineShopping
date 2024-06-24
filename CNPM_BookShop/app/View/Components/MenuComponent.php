<?php

namespace App\View\Components;

use App\Models\Web_Menus;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class MenuComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        $listMenu = Web_Menus::where('status', 'active')
            ->where('position', 1)
            ->orderBy('menu_order')
            ->get();
        return view('components.menu-component', ['listMenu' => $listMenu]);
    }
}
