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
