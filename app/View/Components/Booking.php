<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Booking extends Component
{
    public string $title;
    public string $description;
    public string $image;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $description, string $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.booking');
    }
}
