<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\PrismicService;

class OurCoreServices extends Component
{
    public string $title;
    public string $subtitle;
    public array $services = [];

    /**
     * Create a new component instance.
     */
    public function __construct(PrismicService $prismic, string $title, string $subtitle, array $services)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        foreach ($services as $service) {
            $item = $prismic->getByID($service->our_services->id);
            $data = $item->data->body[0]->primary ?? null;
            if ($data) {
                $this->services[] = (object) [
                    'uid' => $item->uid,
                    'title' => $data->title[0] ? $data->title[0]->text : '',
                    'icon' => $data->icon->url ?? '',
                    'description' => $data->description[0] ? $data->description[0]->text : '',
                ];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.our-core-services');
    }
}
