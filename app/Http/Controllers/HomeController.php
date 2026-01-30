<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrismicService;

class HomeController extends Controller
{
    public function __invoke(PrismicService $prismic)
    {
        $page = $prismic->getSingle('home_page');

        return view('home', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }
}
