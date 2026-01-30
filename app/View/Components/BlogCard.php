<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogCard extends Component
{
    public ?string $image;
    public ?string $title;
    public ?string $excerpt;
    public ?string $content;
    public ?string $createdDate;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $image, ?string $title, ?string $excerpt, ?string $content, ?string $createdDate)
    {
        $this->image = $image;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->createdDate = $createdDate;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-card');
    }
}
