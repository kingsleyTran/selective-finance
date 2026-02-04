<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrismicService;

class ServiceController extends Controller
{
    public function index(PrismicService $prismic)
    {
        $page = $prismic->getSingle('our_services_page');

        return view('services.index', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }

    public function show(PrismicService $prismic, string $slug)
    {
        $page = $prismic->getSingle('our_services', $slug);

        return view('services.show', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }
}
