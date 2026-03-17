<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;

class PageController extends Controller
{
    private const SINGLE_TYPE = 'about_us';
    private const VIEW = 'pages.about';
    private const TERMS_TYPE = 'terms';
    private const TERMS_VIEW = 'pages.terms';

    public function about(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::SINGLE_TYPE, self::VIEW);
    }

    public function terms(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::TERMS_TYPE, self::TERMS_VIEW);
    }
}
