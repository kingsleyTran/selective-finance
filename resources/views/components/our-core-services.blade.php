<section class="mb-12 md:mb-28">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-4">

        {{-- LEFT CONTENT (sticky, follows scroll) --}}
        <div class="md:sticky md:top-24 md:self-start">
            <p class="font-bold text-dark-yellow uppercase tracking-widest text-sm mb-4">
                Our Services
            </p>

            <h2 class="text-4xl md:text-[56px] font-display font-medium text-dark-green mb-6 uppercase">
                {{ $title }}
            </h2>

            <p class="text-davy-grey mb-8 leading-relaxed">
                {!! $subtitle !!}
            </p>

            {{-- @if ($slice->primary->cta_link)
                <a href="{{ $slice->primary->cta_link->url }}"
                    class="inline-block bg-gold text-black px-8 py-4 rounded-full font-medium hover:opacity-90 transition">
                    {{ $slice->primary->cta_label[0]->text ?? 'Explore All Services' }}
                </a>
            @endif --}}
        </div>

        {{-- RIGHT GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($services as $service)
                @php
                    $title = '';
                    if (isset($service->our_services->title) && is_array($service->our_services->title)) {
                        $titleParts = [];
                        foreach ($service->our_services->title as $block) {
                            if (isset($block->text)) {
                                $titleParts[] = e($block->text);
                            }
                        }
                        $title = implode('<br>', $titleParts);
                    } elseif (isset($service->our_services->title)) {
                        $title = e($service->our_services->title);
                    }
                    $description = '';
                    if (isset($service->our_services->description) && is_array($service->our_services->description)) {
                        $descriptionParts = [];
                        foreach ($service->our_services->description as $block) {
                            if (isset($block->text)) {
                                $descriptionParts[] = '<p>' . e($block->text) . '</p>';
                            }
                        }
                        $description = implode('', $descriptionParts);
                    } elseif (isset($service->our_services->description)) {
                        $description = e($service->our_services->description[0]->text);
                    }
                @endphp
                <x-our-service-card
                    :title="$title"
                    :excerpt="$description"
                    :icon="$service->our_services->icon->url" />
            @endforeach
        </div>

    </div>
</section>
