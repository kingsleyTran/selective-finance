<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Menu items: array of objects with label, link, and optional hidden.
     *
     * @var array<int, object{label: string, link: string, hidden?: bool}>
     */
    public array $menuItems = [];

    /**
     * Create a new component instance.
     *
     * @param  array<int, object{label: string, link: string, hidden?: bool}>  $menuItems
     */
    public function __construct(array $menuItems = [])
    {
        $this->menuItems = $menuItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
