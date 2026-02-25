<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class App extends Component
{
    public ?string $title = null;

    public ?string $description = null;

    /** @var array|object|null */
    public $configuration = null;

    /**
     * Create a new component instance.
     */
    public function __construct(array|object|null $configuration = null, ?string $title = null, ?string $description = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->configuration = $configuration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.app');
    }
}
