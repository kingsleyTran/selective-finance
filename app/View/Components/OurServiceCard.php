<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OurServiceCard extends Component
{
    public string $title;
    public string $excerpt;
    public string $icon;
    public ?string $link;
    public ?string $uid;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $excerpt, string $icon, ?string $link, ?string $uid)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->icon = $icon;
        $this->link = $link ?? null;
        $this->uid = $uid ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.our-service-card');
    }
}
