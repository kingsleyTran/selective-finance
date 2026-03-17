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
            $name = '';
            if (isset($bank->name) && is_array($bank->name) && isset($bank->name[0]->text)) {
                $name = $bank->name[0]->text;
            }
            $logo = '';
            if (isset($bank->logo) && is_object($bank->logo) && isset($bank->logo->url)) {
                $logo = $bank->logo->url;
            }
            $this->banks[] = (object) [
                'name' => $name,
                'logo' => $logo,
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
