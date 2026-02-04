<x-layouts.app :title="$page->data->seo_title">
    @foreach ($slices as $slice)
        @switch($slice->slice_type)
            @case('header_section')
                @php
                    $image = $slice->primary->image->url ?? '';
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<br>', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                @endphp
                <x-page-header :image="$image" :title="$title" />
                @break
        @endswitch
    @endforeach
    <x-blogs :currentPage="$currentPage" />
</x-layouts.app>
