<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OurServicesIntro extends Component
{
    public string $title;
    public string $logo;
    public string $image;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $logo, string $image)
    {
        $this->title = $title;
        $this->logo = $logo;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.our-services-intro');
    }
}
