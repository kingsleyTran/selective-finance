<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\PrismicService;
use Carbon\Carbon;

class Blogs extends Component
{
    public int $perPage = 3;
    public int $currentPage = 1;
    public int $totalPages = 0;
    public ?object $featuredPost = null;
    public ?array $blogs = [];

    /**
     * Create a new component instance.
     */
    public function __construct(PrismicService $prismic, int $currentPage = 1)
    {
        $perPage = $currentPage == 1 ? 7 : 6;
        $blogs = $prismic->getAll('blogs', $perPage, $currentPage);
        $this->totalPages = $blogs->total_pages;
        foreach($blogs->results as $index => $blog) {
            $data = $blog->data;
            if ($index == 0 && $currentPage == 1) {
                $this->featuredPost = (object) [
                    'id' => $blog->id,
                    'slug' => sizeof($blog->slugs) > 0 ? $blog->slugs[0] : [],
                    'title' => sizeof($data->title) > 0 ? $data->title[0]->text : '',
                    'excerpt' => sizeof($data->excerpt) > 0 ? $data->excerpt[0]->text : '',
                    'image' => $data->image->url,
                    'content' => sizeof($data->content) > 0 ? $data->content[0]->text : '',
                    'createdDate' => Carbon::parse($blog->first_publication_date)->format('jS F Y')
                ];
            } else {
                $this->blogs[] = (object) [
                    'id' => $blog->id,
                    'slug' => sizeof($blog->slugs) > 0 ? $blog->slugs[0] : [],
                    'title' => sizeof($data->title) > 0 ? $data->title[0]->text : '',
                    'excerpt' => sizeof($data->excerpt) > 0 ? $data->excerpt[0]->text : '',
                    'image' => $data->image->url,
                    'content' => sizeof($data->content) > 0 ? $data->content[0]->text : '',
                    'createdDate' => Carbon::parse($blog->first_publication_date)->format('jS F Y')
                ];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blogs');
    }
}
