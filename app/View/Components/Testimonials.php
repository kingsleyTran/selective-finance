<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Testimonials extends Component
{
    public string $title;
    public string $subtitle;
    public array $testimonials;

    public function __construct(string $title, string $subtitle, array $testimonials)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        foreach ($testimonials as $testimonial) {
            $this->testimonials[] = (object) [
                'company' => $testimonial->company[0]->text,
                'author' => $testimonial->author[0]->text,
                'content' => $testimonial->content[0]->text,
                'position' => $testimonial->position[0]->text,
            ];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.testimonials');
    }
}
