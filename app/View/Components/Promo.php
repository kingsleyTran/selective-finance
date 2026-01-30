<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Promo extends Component
{
    public string $title;
    public ?string $subtitle;
    public string $description;
    public string $image;
    public array $items;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $title,
        ?string $subtitle,
        string $description,
        string $image,
        array $items
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->image = $image;
        foreach ($items as $item) {
            $this->items[] = (object) [
                'title' => $item->title[0]->text,
                'description' => $item->description[0]->text,
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.promo');
    }
}
