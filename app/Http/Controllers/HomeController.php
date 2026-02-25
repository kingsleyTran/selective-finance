<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;

class HomeController extends Controller
{
    private const SINGLE_TYPE = 'home_page';
    private const VIEW = 'home';

    public function __invoke(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::SINGLE_TYPE, self::VIEW);
    }
}
