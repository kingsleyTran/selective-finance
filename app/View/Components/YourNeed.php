<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class YourNeed extends Component
{
    public string $title;
    public string $description;
    public array $items;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $description, array $items)
    {
        $this->title = $title;
        $this->description = $description;
        foreach ($items as $item) {
            $this->items[] = (object) [
                'step_label' => $item->subtitle[0]->text,
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
        return view('components.your-need');
    }
}
