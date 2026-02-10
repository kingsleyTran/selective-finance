<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public string $image;
    public string $title;
    public ?string $postTitle = null; 
    // public ?string $breadcrumbs;
    /**
     * Create a new component instance.
     */
    public function __construct(string $image, string $title, ?string $postTitle = null)
    {
        $this->image = $image;
        $this->title = $title;
        $this->postTitle = $postTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-header');
    }
}
