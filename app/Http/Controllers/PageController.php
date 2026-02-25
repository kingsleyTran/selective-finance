<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;

class PageController extends Controller
{
    private const SINGLE_TYPE = 'about_us';
    private const VIEW = 'pages.about';

    public function about(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::SINGLE_TYPE, self::VIEW);
    }
}
