<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public string $image;
    public string $imageAlt;
    public string $title;
    public string $subtitle;
    /**
     * Create a new component instance.
     */
    public function __construct(
        ?string $image = null,
        ?string $imageAlt = null,
        ?string $title = null,
        ?string $subtitle = null,
    ) {
        $this->image = $image;
        $this->imageAlt = $imageAlt;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero');
    }
}
