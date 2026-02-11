<x-layouts.app :title="$page->data->seo_title">
    @foreach ($slices as $slice)
        @switch($slice->slice_type)
            @case('hero_section')
                @php
                    $title = '';
                    if (isset($slice->primary->hero_title) && is_array($slice->primary->hero_title)) {
                        $titleParts = [];
                        foreach ($slice->primary->hero_title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<br>', $titleParts);
                    } elseif (isset($slice->primary->hero_title)) {
                        $title = e($slice->primary->hero_title);
                    }
                    $subtitle = '';
                    if (isset($slice->primary->hero_subtitle) && is_array($slice->primary->hero_subtitle)) {
                        $subtitleParts = [];
                        foreach ($slice->primary->hero_subtitle as $block) {
                            if (isset($block->text)) {
                                $subtitleParts[] = e($block->text);
                            }
                        }
                        $subtitle = implode(' ', $subtitleParts);
                    } elseif (isset($slice->primary->hero_subtitle)) {
                        $subtitle = e($slice->primary->hero_subtitle);
                    }
                @endphp
                <x-hero
                    :image="$slice->primary->hero_image->url ?? ''"
                    :imageAlt="$slice->primary->hero_image->alt ?? ''"
                    :title="$title"
                    :subtitle="$subtitle" />
                @break
            @case('partner_section')
                <x-partners :partners="$slice->items" />
                @break
            @case('about_us_section')
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
                <x-about-us
                    :title="$title"
                    :description="$description"
                    :images="$slice->items ?? []" />
                @break
            @case('our_services_section')
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
                @endphp
                <x-our-core-services :title="$title" :subtitle="$subtitle" :services="$slice->items ?? []" />
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
                <x-promo :title="$title" :subtitle="$subtitle" :description="$description" :image="$image" :items="$items" />
                @break
            @case('booking_section')
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
                    $image = $slice->primary->image->url ?? '';
                @endphp
                <x-booking :title="$title" :description="$description" :image="$image" />
                @break
            @case('testimonials_section')
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
                @endphp
                <x-testimonials :title="$title" :subtitle="$subtitle" :testimonials="$slice->items ?? []" />
                @break
            @case('blogs_section')
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
                <x-blog-slider :title="$title" />
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
                    $image = $slice->primary->image->url ?? '';
                @endphp
                <div id="let-connect">
                    <x-contact-form :title="$title" :image="$image" :description="$description" />
                </div>
                @break
        @endswitch
    @endforeach
</x-layouts.app>
