<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\PrismicService;

class Services extends Component
{
    public string $title;
    public string $subtitle;
    public array $services;
    /**
     * Create a new component instance.
     */
    public function __construct(PrismicService $prismic, string $title, string $subtitle)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $services = $prismic->getAll('our_services', 30);
        foreach ($services->results as $service) {
            $data = $service->data->body[0]->primary;
            $this->services[] = (object) [
                'id' => $service->id,
                'href' => $service->href,
                'slug' => $service->slugs[0],
                'title' => $data->title[0] ? $data->title[0]->text : '',
                'image' => $data->image->url ?? '',
                'description' => $data->description[0] ? $data->description[0]->text : '',
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services');
    }
}
