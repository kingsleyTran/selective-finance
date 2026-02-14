<?php

namespace App\View\Components;

use App\Services\PrismicService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactForm extends Component
{
    public string $image;
    public string $title;
    public string $description;
    public array $services = [];

    /**
     * Create a new component instance.
     */
    public function __construct(PrismicService $prismic, string $image, string $title, string $description)
    {
        $this->image = $image;
        $this->title = $title;
        $this->description = $description;

        $result = $prismic->getAll('our_services', 30);
        foreach ($result->results as $service) {
            $data = $service->data->body[0]->primary ?? null;
            if ($data && isset($data->title[0])) {
                $titleText = $data->title[0]->text ?? '';
                if ($titleText !== '') {
                    $this->services[] = (object) [
                        'uid' => $service->uid,
                        'title' => $titleText,
                    ];
                }
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact-form');
    }
}
