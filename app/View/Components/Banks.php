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
            // Safely resolve name field which may be an array of rich text blocks.
            $name = '';
            if (is_array($bank->name ?? null)) {
                $first = $bank->name[0] ?? null;
                $name = is_object($first) && isset($first->text) ? $first->text : '';
            } elseif (is_string($bank->name ?? null)) {
                $name = $bank->name;
            }

            // Safely resolve logo URL.
            $logoUrl = $bank->logo->url ?? '';

            if ($name === '' && $logoUrl === '') {
                continue;
            }

            $this->banks[] = (object) [
                'name' => $name,
                'logo' => $logoUrl,
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
