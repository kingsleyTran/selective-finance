<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banks extends Component
{
    public string $title;
    public array $banks = [];

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, array $banks)
    {
        $this->title = $title;
        foreach ($banks as $bank) {
            $this->banks[] = (object) [
                'name' => $bank->name[0]->text,
                'logo' => $bank->logo->url,
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.banks');
    }
}
