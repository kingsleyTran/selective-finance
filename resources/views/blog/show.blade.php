<x-layouts.app :title="$page->data->seo_title">
    @php
        $image = $page->data->image->url ?? '';
        $title = '';
        if (isset($page->data->title) && is_array($page->data->title)) {
            $titleParts = [];
            foreach ($page->data->title as $block) {
                if (isset($block->text)) {
                    $titleParts[] = e($block->text);
                }
            }
            $title = implode('<br>', $titleParts);
        } elseif (isset($page->data->title)) {
            $title = e($page->data->title);
        }
    @endphp
    <x-page-header :image="$image" :title="'Blog'" :postTitle="$title" />
    <section class="mb-12 md:mb-28">
        <div class="max-w-3xl mx-auto">
            @php
                $content = '';

                if (!empty($page->data->content)) {
                    // Ensure we always pass an array of blocks to RichText
                    $richTextField = is_array($page->data->content)
                        ? $page->data->content
                        : [$page->data->content];

                    $content = \Prismic\Dom\RichText::asHtml(
                        $richTextField,
                        null,
                        function ($element, $content) {
                            switch ($element->type ?? '') {
                                case 'heading1':
                                    return "<h2 class='font-bold text-4xl mt-10 mb-4 text-dark-green'>{$content}</h2>";

                                case 'heading2':
                                    return "<h3 class='font-bold text-3xl mt-8 mb-4 text-dark-green'>{$content}</h3>";

                                case 'heading3':
                                    return "<h4 class='font-bold text-2xl mt-6 mb-3 text-dark-green'>{$content}</h4>";

                                case 'heading4':
                                    return "<h5 class='font-bold text-xl mt-4 mb-3 text-dark-green'>{$content}</h5>";

                                case 'heading5':
                                    return "<h6 class='font-bold text-lg mt-4 mb-2 text-dark-green'>{$content}</h6>";

                                case 'heading6':
                                    return "<h6 class='font-bold text-base mt-3 mb-2 text-dark-green'>{$content}</h6>";

                                case 'paragraph':
                                    return "<p class='mb-6 text-davy-grey'>{$content}</p>";

                                case 'preformatted':
                                    return "<pre class='mb-6 overflow-x-auto rounded-lg bg-black/5 p-4 font-mono text-sm text-dark leading-relaxed'><code>{$content}</code></pre>";

                                case 'hyperlink':
                                    $url = \Prismic\Dom\Link::asUrl($element->data ?? null);
                                    return "<a href='{$url}' class='text-dark-yellow underline'>{$content}</a>";

                                case 'list-item':
                                case 'o-list-item':
                                    return "<li class='ml-6 list-disc mb-2'>{$content}</li>";

                                case 'image':
                                    $img = '<img src="' . e($element->url ?? '') . '" alt="' . e($element->alt ?? '') . '" class="mx-auto my-6 max-w-full h-auto">';
                                    return '<div class="flex justify-center">' . $img . '</div>';

                                case 'embed':
                                    $oembed = $element->oembed ?? null;
                                    if (!$oembed) {
                                        return '<!-- empty embed -->';
                                    }
                                    $providerAttr = isset($oembed->provider_name) ? ' data-oembed-provider="' . strtolower($oembed->provider_name) . '"' : '';
                                    $embedUrl = $oembed->embed_url ?? '';
                                    $embedType = isset($oembed->type) ? strtolower($oembed->type) : 'rich';
                                    $embedHtml = $oembed->html ?? '';
                                    if ($embedHtml) {
                                        return '<div data-oembed="' . e($embedUrl) . '" data-oembed-type="' . e($embedType) . '"' . $providerAttr . '>' . $embedHtml . '</div>';
                                    }
                                    if ($embedUrl) {
                                        return '<div class="my-6" data-oembed="' . e($embedUrl) . '" data-oembed-type="' . e($embedType) . '"' . $providerAttr . '><a href="' . e($embedUrl) . '" class="text-dark-yellow underline" target="_blank" rel="noopener">' . e($embedUrl) . '</a></div>';
                                    }
                                    return '<!-- empty embed -->';

                                default:
                                    return null;
                            }
                        }
                    );
                }
            @endphp
            {!! $content !!}
        </div>
    </section>
</x-layouts.app>
