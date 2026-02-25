<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Partner extends Component
{
    /**
     * @var array|\Illuminate\Support\Collection
     */
    public array $partners;
    public string $title;

    public function __construct(array $partners = [], string $title = '')
    {
        $this->partners = is_array($partners) ? $partners : collect($partners)->all();
        $this->title = $title ?? '';
    }

    public function render(): View|Closure|string
    {
        return view('components.partners');
    }
}
