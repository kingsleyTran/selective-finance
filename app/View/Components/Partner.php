<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Partner extends Component
{
    /**
     * @var array|\Illuminate\Support\Collection
     */
    public $partners;

    public function __construct($partners = [])
    {
        $this->partners = is_array($partners) ? $partners : collect($partners)->all();
    }

    public function render(): View|Closure|string
    {
        return view('components.partners');
    }
}
