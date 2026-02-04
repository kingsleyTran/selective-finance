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
}
