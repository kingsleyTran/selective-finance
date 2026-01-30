<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\PrismicService;

class BlogSlider extends Component
{
    public string $title;
    public array $blogs;
    /**
     * Create a new component instance.
     */
    public function __construct(PrismicService $prismic, string $title)
    {
        $this->title = $title;
        $blogs = $prismic->getAll('blogs');
        $this->blogs = $blogs->results;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-slider');
    }
}
