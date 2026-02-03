<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrismicService;

class PageController extends Controller
{
    public function about(PrismicService $prismic)
    {
        $page = $prismic->getSingle('about_us');

        return view('pages.about', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }
}
