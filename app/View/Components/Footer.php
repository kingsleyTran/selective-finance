<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Footer contact block: title, email, phone_number, address.
     *
     * @var object{title?: string, email?: string, phone_number?: string, address?: string}|null
     */
    public $footerContact = null;

    /**
     * Footer navigation block: title, items (array of {label, link}).
     *
     * @var object{title?: string, items?: array}|null
     */
    public $footerNavigation = null;

    /**
     * Create a new component instance.
     */
    public function __construct($configuration = null)
    {
        $config = is_array($configuration) ? $configuration : (array) $configuration;
        $this->footerContact = $config['footer_contact'] ?? null;
        $this->footerNavigation = $config['footer_navigation'] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
