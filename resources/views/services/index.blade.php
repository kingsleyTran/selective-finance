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
                        $title = implode('<span class="md:hidden"> </span><br class="hidden md:inline">', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                @endphp
                <x-page-header :image="$image" :title="$title" />
                @break
            @case('intro_section')
                @php
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<span class="md:hidden"> </span><br class="hidden md:inline">', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                    $logo = $slice->primary->logo->url ?? '';
                    $image = $slice->primary->image->url ?? '';
                @endphp
                <x-our-services-intro :title="$title" :logo="$logo" :image="$image" />
                @break
            @case('services_section')
                @php
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<span class="md:hidden"> </span><br class="hidden md:inline">', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                    $subtitle = '';
                    if (isset($slice->primary->subtitle) && is_array($slice->primary->subtitle)) {
                        $subtitleParts = [];
                        foreach ($slice->primary->subtitle as $block) {
                            if (isset($block->text)) {
                                $subtitleParts[] = e($block->text);
                            }
                        }
                        $subtitle = implode('<br>', $subtitleParts);
                    } elseif (isset($slice->primary->subtitle)) {
                        $subtitle = e($slice->primary->subtitle);
                    }
                @endphp
                <x-services :title="$title" :subtitle="$subtitle" />
                @break
            @case('contact_section')
                @php
                    $title = '';
                    if (isset($slice->primary->title) && is_array($slice->primary->title)) {
                        $titleParts = [];
                        foreach ($slice->primary->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<span class="md:hidden"> </span><br class="hidden md:inline">', $titleParts);
                    } elseif (isset($slice->primary->title)) {
                        $title = e($slice->primary->title);
                    }
                    $description = '';
                    if (isset($slice->primary->description) && is_array($slice->primary->description)) {
                        $descriptionParts = [];
                        foreach ($slice->primary->description as $block) {
                            if (isset($block->text)) {
                                $descriptionParts[] = '<p>' . e($block->text) . '</p>';
                            }
                        }
                        $description = implode('', $descriptionParts);
                    } elseif (isset($slice->primary->description)) {
                        $description = '<p>' . e($slice->primary->description) . '</p>';
                    }
                    $image = $slice->primary->image->url ?? '';
                @endphp
                <x-contact-form :title="$title" :image="$image" :description="$description" />
                @break
        @endswitch
    @endforeach
</x-layouts.app>
