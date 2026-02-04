<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HowWeWork extends Component
{
    public $title;
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $items)
    {
        $this->title = $title;
        foreach ($items as $index => $item) {
            $this->items[] = (object) [
                'index' => $index > 9 ? $index + 1 : '0' . $index + 1,
                'title' => sizeof($item->title) > 0 ? $item->title[0]->text : '',
                'description' => sizeof($item->description) > 0 ? $item->description[0]->text : '',
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.how-we-work');
    }
}
