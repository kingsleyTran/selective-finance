<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;
use Illuminate\View\View;

abstract class Controller
{
    /**
     * Configuration for Prismic single-type pages keyed by a logical name.
     *
     * @var array<string, array{type: string, view: string}>
     */
    protected array $singlePageConfig = [];
    protected $configuration = null;

    public function __construct(PrismicService $prismic)
    {
        // Central configuration for all single-type pages
        $this->singlePageConfig = [
            'home' => [
                'type' => 'home_page',
                'view' => 'home',
            ],
            'about' => [
                'type' => 'about_us',
                'view' => 'pages.about',
            ],
            'services.index' => [
                'type' => 'our_services_page',
                'view' => 'services.index',
            ],
            'contact' => [
                'type' => 'contact_us',
                'view' => 'contact.show',
            ],
            'blog.index' => [
                'type' => 'blog_page',
                'view' => 'blog.index',
            ],
        ];

        // Load global configuration from Prismic (menu, footer_contact, footer_navigation)
        $this->configuration = [];
        $configuration = $prismic->getSingle('configuration');
        if ($configuration && isset($configuration->data->body)) {
            foreach ($configuration->data->body as $data) {
                switch ($data->slice_type ?? '') {
                    case 'menu':
                        foreach ($data->items ?? [] as $item) {
                            $this->configuration['menu'][] = (object) [
                                'label' => $item->label[0]->text ?? '',
                                'link' => $item->{'link-url'} ?? $item->link->url ?? '#',
                                'hidden' => $item->hidden ?? false,
                            ];
                        }
                        break;
                    case 'footer_contact':
                        $this->configuration['footer_contact'] = (object) [
                            'title' => $data->primary->title[0]->text ?? null,
                            'email' => $data->primary->email[0]->text ?? null,
                            'phone_number' => $data->primary->phone_number[0]->text ?? null,
                            'address' => $data->primary->address[0]->text ?? null,
                        ];
                        break;
                    case 'footer_navigation':
                        $items = [];
                        foreach ($data->items ?? [] as $item) {
                            $items[] = (object) [
                                'label' => $item->label[0]->text ?? null,
                                'link' => $item->link->url ?? $item->{'link-url'} ?? null,
                            ];
                        }
                        $this->configuration['footer_navigation'] = (object) [
                            'title' => $data->primary->title[0]->text ?? null,
                            'items' => $items,
                        ];
                        break;
                    case 'footer_connection':
                        $items = [];
                        foreach ($data->items ?? [] as $item) {
                            $items[] = (object) [
                                'label' => $item->label[0]->text ?? null,
                                'link' => $item->link->url ?? $item->{'link-url'} ?? null,
                            ];
                        }
                        $this->configuration['footer_connection'] = (object) [
                            'title' => $data->primary->title[0]->text ?? null,
                            'items' => $items,
                        ];
                        break;
                }
            }
        }
    }

    /**
     * Get a single document by Prismic type and return a view with page + slices.
     *
     * @param  array<string, mixed>  $viewData  Extra data to pass to the view (merged with page, slices).
     */
    protected function renderSingle(PrismicService $prismic, string $type, string $view, array $viewData = []): View
    {
        $page = $prismic->getSingle($type);

        return view($view, array_merge([
            'page' => $page,
            'slices' => $page->data->body ?? [],
            'configuration' => $this->configuration,
        ], $viewData));
    }

    /**
     * Get a document by Prismic type + UID and return a view. Aborts with 404 if not found.
     *
     * @param  array<string, mixed>  $viewData  Extra data to pass to the view (merged with page, optional slices).
     */
    protected function renderByUID(PrismicService $prismic, string $type, string $uid, string $view, array $viewData = []): View
    {
        $page = $prismic->getByUID($type, $uid);
        abort_if(! $page, 404);

        return view($view, array_merge([
            'page' => $page,
            'slices' => $page->data->body ?? [],
            'configuration' => $this->configuration,
        ], $viewData));
    }
}
