<?php

namespace App\Http\Controllers;

use App\Services\PrismicService;

class BlogController extends Controller
{
    private const INDEX_TYPE = 'blog_page';
    private const INDEX_VIEW = 'blog.index';
    private const SHOW_TYPE = 'blogs';
    private const SHOW_VIEW = 'blog.show';

    public function index(PrismicService $prismic)
    {
        return $this->renderSingle($prismic, self::INDEX_TYPE, self::INDEX_VIEW, [
            'currentPage' => 1,
        ]);
    }

    public function show(PrismicService $prismic, string $slug)
    {
        return $this->renderByUID($prismic, self::SHOW_TYPE, $slug, self::SHOW_VIEW);
    }
}
