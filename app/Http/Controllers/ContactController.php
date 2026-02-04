<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrismicService;

class ContactController extends Controller
{
    public function show(PrismicService $prismic)
    {
        $page = $prismic->getSingle('contact_us');

        return view('contact.show', [
            'page' => $page,
            'slices' => $page->data->body,
        ]);
    }
}
