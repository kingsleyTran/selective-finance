<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FAQ extends Component
{
    public string $title;
    public array $items;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, array $items)
    {
        $this->title = $title;
        foreach($items as $item) {
            $this->items[] = (object) [
                'question' => sizeof($item->question) > 0 ? $item->question[0]->text : '',
                'answer' => sizeof($item->answer) > 0 ? $item->answer[0]->text : '',
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.f-a-q');
    }
}
