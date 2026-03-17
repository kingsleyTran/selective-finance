<x-layouts.app :configuration="$configuration" :title="$page->data->seo_title ?? 'Terms & Conditions'">
    @php
        $seoBanner = $page->data->seo_image->url ?? '';
        $seoTitle = $page->data->seo_title ?? 'Terms & Conditions';
        $hasHeaderSection = collect($slices)->contains(fn ($slice) => ($slice->slice_type ?? null) === 'header_section');
    @endphp

    @if (!$hasHeaderSection && $seoBanner)
        <x-page-header :image="$seoBanner" :title="$seoTitle" />
    @endif

    @foreach ($slices as $slice)
        @switch($slice->slice_type)
            @case('header_section')
                @php
                    $image = $slice->primary->image->url ?? $seoBanner;
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
                    if ($title === '') {
                        $title = e($seoTitle);
                    }
                @endphp
                <x-page-header :image="$image" :title="$title" />
                @break

            @case('terms_section')
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

                    $renderInline = function ($block): string {
                        $text = (string) ($block->text ?? '');
                        if ($text === '') {
                            return '';
                        }

                        $spans = is_array($block->spans ?? null) ? $block->spans : [];
                        if (count($spans) === 0) {
                            return nl2br(e($text));
                        }

                        $len = mb_strlen($text, 'UTF-8');
                        $openAt = [];
                        $closeAt = [];

                        foreach ($spans as $span) {
                            $start = max(0, (int) ($span->start ?? 0));
                            $end = min($len, (int) ($span->end ?? 0));
                            if ($end <= $start) {
                                continue;
                            }
                            $openAt[$start][] = $span;
                            $closeAt[$end][] = $span;
                        }

                        $openTag = function ($span): string {
                            $type = $span->type ?? '';
                            if ($type === 'strong') {
                                return '<strong>';
                            }
                            if ($type === 'em') {
                                return '<em>';
                            }
                            if ($type === 'hyperlink') {
                                $url = $span->data->url ?? '#';
                                return '<a href="' . e($url) . '" target="_blank" rel="noopener noreferrer" class="underline">';
                            }
                            return '';
                        };

                        $closeTag = function ($span): string {
                            $type = $span->type ?? '';
                            if ($type === 'strong') {
                                return '</strong>';
                            }
                            if ($type === 'em') {
                                return '</em>';
                            }
                            if ($type === 'hyperlink') {
                                return '</a>';
                            }
                            return '';
                        };

                        $html = '';
                        for ($i = 0; $i <= $len; $i++) {
                            if (isset($closeAt[$i])) {
                                foreach (array_reverse($closeAt[$i]) as $span) {
                                    $html .= $closeTag($span);
                                }
                            }

                            if (isset($openAt[$i])) {
                                usort($openAt[$i], fn ($a, $b) => ((int) ($b->end ?? 0)) <=> ((int) ($a->end ?? 0)));
                                foreach ($openAt[$i] as $span) {
                                    $html .= $openTag($span);
                                }
                            }

                            if ($i < $len) {
                                $char = mb_substr($text, $i, 1, 'UTF-8');
                                $html .= $char === "\n" ? '<br>' : e($char);
                            }
                        }

                        return $html;
                    };

                    $content = '';
                    if (isset($slice->primary->content) && is_array($slice->primary->content)) {
                        $contentParts = [];
                        $listType = null;
                        $listItems = [];

                        $flushList = function () use (&$contentParts, &$listType, &$listItems) {
                            if ($listType && count($listItems) > 0) {
                                $tag = $listType === 'o-list-item' ? 'ol' : 'ul';
                                $contentParts[] = '<' . $tag . ' class="list-inside ml-2 mb-4 ' . ($tag === 'ol' ? 'list-decimal' : 'list-disc') . '">' . implode('', $listItems) . '</' . $tag . '>';
                            }
                            $listType = null;
                            $listItems = [];
                        };

                        foreach ($slice->primary->content as $block) {
                            $type = $block->type ?? 'paragraph';
                            $text = (string) ($block->text ?? '');
                            if (trim($text) === '') {
                                continue;
                            }

                            if ($type === 'list-item' || $type === 'o-list-item') {
                                if ($listType !== null && $listType !== $type) {
                                    $flushList();
                                }
                                $listType = $type;
                                $listItems[] = '<li class="mb-2">' . $renderInline($block) . '</li>';
                                continue;
                            }

                            $flushList();

                            if (in_array($type, ['heading1', 'heading2', 'heading3', 'heading4'], true)) {
                                $tag = $type === 'heading1' ? 'h2' : ($type === 'heading2' ? 'h3' : 'h4');
                                $contentParts[] = '<' . $tag . ' class="font-display font-medium text-dark-green mt-8 mb-4">' . $renderInline($block) . '</' . $tag . '>';
                            } else {
                                $contentParts[] = '<p class="mb-4">' . $renderInline($block) . '</p>';
                            }
                        }

                        $flushList();
                        $content = implode('', $contentParts);
                    } elseif (isset($slice->primary->content)) {
                        $content = (string) $slice->primary->content;
                    }
                @endphp

                <section class="mb-14 md:mb-28">
                    <div class="mx-auto max-w-screen-2xl px-6">
                        <div class="max-w-4xl mx-auto">
                            @if($title)
                                <h2 class="font-display font-medium text-3xl md:text-4xl lg:text-[56px] leading-[130%] tracking-[-0.56px] text-dark-green uppercase mb-8">
                                    {!! $title !!}
                                </h2>
                            @endif
                            <div class="text-davy-grey leading-8 space-y-4">
                                {!! $content !!}
                            </div>
                        </div>
                    </div>
                </section>
                @break
        @endswitch
    @endforeach
</x-layouts.app>
