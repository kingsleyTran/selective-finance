<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrismicService;

class BlogController extends Controller
{
    public function index(PrismicService $prismic)
    {
        $page = $prismic->getSingle('blog_page');

        return view('blog.index', [
            'page' => $page,
            'slices' => $page->data->body,
            'currentPage' => 1,
        ]);
    }
}
