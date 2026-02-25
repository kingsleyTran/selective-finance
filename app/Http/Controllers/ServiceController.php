<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;

class ServiceController extends Controller
{
    private const INDEX_TYPE = 'our_services_page';
    private const INDEX_VIEW = 'services.index';
    private const SHOW_TYPE = 'our_services';
    private const SHOW_VIEW = 'services.show';

    public function index(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::INDEX_TYPE, self::INDEX_VIEW);
    }

    public function show(PrismicService $prismic, string $slug)
    {
        return $this->renderByUID($prismic, self::SHOW_TYPE, $slug, self::SHOW_VIEW);
    }
}
