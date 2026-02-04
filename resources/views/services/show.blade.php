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
                        $title = implode('<br>', $titleParts);
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
                @endphp
                <section class="mb-26">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="font-display font-medium text-5xl text-dark-green uppercase mb-6">{{ $title }}</h2>
                        <div class="text-davy-grey">{!! $description !!}</div>
                    </div>
                </section>
                @break
            @case('why_choose_section')
                @php
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
                    $items = $slice->items ?? [];
                @endphp
                <x-promo :title="$title" :subtitle="$subtitle" :description="$description" :image="$image" :items="$items" :titleTop="false" />
                @break
            @case('how_we_work_section')
                @php
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
                <x-how-we-work :title="$title" :items="$slice->items" />
                @break
            @case('faq_section')
                @php
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
                    $items = $slice->items ?? [];
                @endphp
                <x-f-a-q :title="$title" :items="$slice->items" />
                @break
        @endswitch
    @endforeach
</x-layouts.app>
